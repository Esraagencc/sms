<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class telegramController extends Controller
{
    public function telegramGonder(){
        $token = "6138758612:AAHoXCdWo_JB7lyT0IUWcfdfT8BP_Utwr8o";
        $data = [
            "text" => "TEST Kodgunlugum.com",
            "chat_id" => "5207470218"
        ];
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?".http_build_query($data));
    }
}
