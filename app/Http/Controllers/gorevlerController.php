<?php

namespace App\Http\Controllers;

use App\Models\gorevlertablosu;
use Illuminate\Http\Request;

class gorevlerController extends Controller
{
    public function gorev(){
        return view('gorevlerform');
    }
    public function gorev_ekle(Request $request){
     gorevlertablosu::create([
            "gorev_zamani" => $request['gorev_zamani'],
            "notlar" => $request['notlar'],
            "sms_durum" => 0,

        ]);
    }
}
