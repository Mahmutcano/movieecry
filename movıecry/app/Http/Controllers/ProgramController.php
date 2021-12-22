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
            'channels_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'timezone' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:4096'
        ]);

        $newImageEpgName = uniqid() . '-' . $request->id . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageEpgName);

        Epg::create([
            'id' => $request->id,
            'channels_id' => $request->channels_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'timezone' => $request->timezone,
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
    public function eedit($id)
    {
        $epg = Epg::where('id', $id)->first();
        return view('epgs.eedit', compact('epg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'timezone' => 'required'

        ]);

        $epg = Epg::where('id',$id)->first();

        if ($request->hasFile('image')) {
            $request->validate([
                'İmage' => 'required|image|mimes:jpg,jpeg,png|max:4096'
            ]);
            $newImageEpgName = uniqid() . '-' . $request->id . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageEpgName);
            $epg->cimg = $newImageEpgName;
        }

        $epg->id = $request->id;
        $epg->start_time = $request->start_time;
        $epg->end_time = $request->end_time;
        $epg->timezone = $request->timezone;
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
