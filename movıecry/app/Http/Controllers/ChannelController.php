<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Channel;

class ChannelController extends Controller
{
    public function cindex(){
        $channels = Channel::orderBy('updated_at', 'DESC')->paginate(6);
        return view('channelview',compact('channels'));
    }

    public function cshow($cname){
        $channels = Channel::where('cname',$cname)->first();
        return view('channel-cshow',compact('channel'));
    }
}
