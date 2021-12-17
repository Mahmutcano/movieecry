<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Channel;

class ChannelController extends Controller
{
       public function channelAdd(){
        $channels = Channel::orderBy('updated_at', 'DESC')->paginate(0);
        return view('channelview',compact('channels'));
    }

    public function channelShow($ctime){
        $channel = Channel::where('ctime',$ctime)->first();
        return view('channel-channelShow',compact('channel'));
    }
}