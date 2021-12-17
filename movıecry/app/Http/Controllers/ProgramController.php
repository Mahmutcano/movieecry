<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Epg;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eindex()
    {
        $epgs = Epg::where('user_id', auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate(5);
        return view('epgs.eindex', compact('epgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ecreate()
    {
        return view('epgs.ecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function epgstore(Request $request)
    {
                $request->validate([
            'etitle' => 'required',
            'etime' => 'required',
            'ename' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:4096'
        ]);

        $newImageEpgName = uniqid() . '-' . $request->etitle . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageEpgName);

        Epg::create([
            'etitle' => $request->etitle,
            'etime' => $request->etime,
            'ename' => $request->ename,
            'eimg' => $newImageEpgName,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->with('messages', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eedit($ename)
    {
        $epg = Epg::where('ename', $ename)->first();
        return view('epgs.eedit', compact('epg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ename)
    {
        $request->validate([
            'etitle' => 'required',
            'etime' => 'required'
        ]);

        $epg = Epg::where('ename',$ename)->first();

        if ($request->hasFile('image')) {
            $request->validate([
                'İmage' => 'required|image|mimes:jpg,jpeg,png|max:4096'
            ]);
            $newImageEpgName = uniqid() . '-' . $request->etitle . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageEpgName);
            $epg->cimg = $newImageEpgName;
        }

        $epg->etitle = $request->etitle;
        $epg->etime = $request->etime;
        $epg->ename = $request->ename;
        $epg->user_id = auth()->user()->id;
        $epg->update();

        return redirect()->route('eindex')->with('messages', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $epg = Epg::where('id',$id)->first();
        $epg->delete();

        return redirect()->route('eindex')->with('messages', 'Deleted successfully!');
    }
}