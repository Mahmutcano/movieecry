<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cindex()
    {
        $channels = Channel::where('user_id', auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate(12);
        return view('channel.cindex', compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ccreate()
    {
        return view('channel.ccreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cstore(Request $request)
    {
        $request->validate([
            'ctitle' => 'required',
            'cdate' => 'required',
            'ctime' => 'required',
            'cname' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:4096',


        ]);

        $newImageChannelName = uniqid() . '-' . $request->ctitle . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageChannelName);



        Channel::create([
            'ctitle' => $request->ctitle,
            'ctime' => $request->ctime,
            'cdate' => $request->cdate,
            'cname' => $request->cname,
            'cimg' => $newImageChannelName,
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
    public function cshow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function cedit($cname)
    {
        $channel = Channel::where('cname', $cname)->first();
        return view('channel.cedit', compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function cupdate(Request $request, $cname)
    {
        $request->validate([
            'ctitle' => 'required',
            'ctime' => 'required',
            'cdate' => 'required',
            'cname' => 'required',



        ]);

        $channel = Channel::where('cname',$cname)->first();

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:4096',

            ]);

            $newImageChannelName = uniqid() . '-' . $request->ctitle . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageChannelName);
            $channel->image_path = $newImageChannelName;


        }

        $channel->ctitle = $request->ctitle;
        $channel->cdate = $request->cdate;
        $channel->ctime = $request->ctime;
        $channel->cname = $request->cname;
        $channel->user_id = auth()->user()->id;
        $channel->update();

        return redirect()->route('cindex')->with('messages', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cdestroy($id)
    {
        $channel = Channel::where('id',$id)->first();
        $channel->delete();

        return redirect()->route('cindex')->with('messages', 'Deleted successfully!');
    }
}
