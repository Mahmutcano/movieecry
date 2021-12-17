<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Channel;

use Illuminate\Support\Str;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function channelAdd()
    {
        $channels = Channel::where('user_id', auth()->user()->id)->orderBy('updated_at', 'DESC')->paginate(5);
        return view('channel.channelAdd', compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function channelCreate()
    {
        return view('channel.channelCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function channelStore(Request $request)
    {
                $request->validate([
            'ctitle' => 'required',
            'ctime' => 'required',
            'cname' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:4096'
        ]);

        $newImageChannelName = uniqid() . '-' . $request->ctitle . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageChannelName);

        Channel::create([
            'ctitle' => $request->ctitle,
            'ctime' => $request->ctime,
            'cname' => $request->cname,
            'cimg' => $newImageChannelName,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->with('messages', 'Channel has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function channelShow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function channelEdit($ctime)
    {
        $channel = Channel::where('ctime', $ctime)->first();
        return view('channel.channelEdit', compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function channelUpdate(Request $request, $ctime)
    {
        $request->validate([
            'ctitle' => 'required',
            'cname' => 'required'
        ]);

        $channel = Channel::where('ctime',$ctime)->first();

        if ($request->hasFile('image')) {
            $request->validate([
                'İmage' => 'required|image|mimes:jpg,jpeg,png|max:4096'
            ]);
            $newImageChannelName = uniqid() . '-' . $request->ctitle . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageChannelName);
            $channel->cimg = $newImageChannelName;
        }

        $channel->ctitle = $request->ctitle;
        $channel->ctime = $request->ctime;
        $channel->cname = $request->cname;
        $channel->user_id = auth()->user()->id;
        $channel->update();

        return redirect()->route('channelAdd')->with('messages', 'Channel has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function channelDestroy($id)
    {
        $channel = Channel::where('id',$id)->first();
        $channel->delete();

        return redirect()->route('channelAdd')->with('messages', 'Channel has been deleted successfully!');
    }
}