<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

function separaIdVideo($enlace){
    $url = $enlace; 
    $pos = mb_stripos($url, "=");
    $url = substr($url, $pos+1);
    $pos2 = mb_stripos($url, "&");
    
    if ($pos2 == null){
        $idVideo = $url;
    }else {
        $idVideo = substr($url, 0, $pos2);
    }       

    return $idVideo;
}

function unSoloSalto($amove){
   $amove = str_replace("<br />", "<p>", $amove);
   return $amove;
}
