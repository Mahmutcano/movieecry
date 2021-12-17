<?php

namespace App\Http\Controllers;

use App\Models\Epg;
use Illuminate\Http\Request;


class EpgController extends Controller
{
    public function eindex(){
        $epgs = Epg::orderBy('updated_at', 'DESC')->paginate(6);
        return view('epglist',compact('epgs'));
    }

    public function eshow($ename){
        $epg = Epg::where('ename',$ename)->first();
        return view('epg-eshow',compact('epg'));
    }
}