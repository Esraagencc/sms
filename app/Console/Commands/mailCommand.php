<?php

namespace App\Console\Commands;

use App\Models\gorevlertablosu;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class mailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:gonder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $zaman = now();
        $gorev = gorevlertablosu::whereDate('gorev_zamani', '<=', now())->where('sms_durum', 0)->get();
        foreach ($gorev as $gorevv) {
            $gorevv->sms_durum = 1;
            $gorevv->save();
            Mail::send(['text' => 'mail'], ["name" => "$gorevv->notlar"], function ($message) {
                $message->to("omerrtunc@hotmail.com", "omer")->subject("welcome");
            });
        }
    }
}
