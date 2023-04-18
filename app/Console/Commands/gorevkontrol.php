<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\gorevlertablosu;

class gorevkontrol extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gorev:kontrolet';

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
       $zaman= now();
       $gorev=gorevlertablosu::whereDate('gorev_zamani', '<=', now())->where('sms_durum',0)->get();
        foreach ($gorev as $gorevv) {
            $gorevv->sms_durum=1;
            $gorevv->save();
            header('Content-Type: text/html; charset=utf-8');
            $postUrl='http://www.toplusmsyolla.com/smsgonder1Npost.php';
            $KULLANICINO='3037847';
            $KULLANICIADI='905382900434';
            $SIFRE='3037316';
            $ORGINATOR="Omer TUNC";

            $TUR='Normal';  // Normal yada Turkce
            $ZAMAN='2014-04-07 10:00:00';
            $ZAMANASIMI='2014-04-07 17:00:00';

            $mesaj1=$gorevv->notlar;
            $numara1='5309635542';

            $xmlString='data=<sms>
<kno>'. $KULLANICINO .'</kno>
<kulad>'. $KULLANICIADI .'</kulad>
<sifre>'.$SIFRE .'</sifre>
<gonderen>'.  $ORGINATOR .'</gonderen>
<mesaj>'. $mesaj1 .'</mesaj>
<numaralar>'. $numara1.'</numaralar>
<tur>'. $TUR .'</tur>
</sms>';

// Xml içinde aşağıdaki alanlarıda gönderebilirsiniz.
//<zaman>'. $ZAMAN.'</zaman> İleri tarih için kullanabilirsiniz
//<zamanasimi>'. $ZAMANASIMI.'</zamanasimi>  Sms ömrünü belirtir

            $Veriler =  $xmlString;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $postUrl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $Veriler);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            $response = curl_exec($ch);
            curl_close($ch);
            echo $response;
        }
    }
}
