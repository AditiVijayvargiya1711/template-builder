<?php
namespace App\orangeBD;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ServiceIdClass {

   public static function getServiceId(){

      try {
         //$sid = Http::get(env('MYGOV_API_URL').'/v4/api/get-service-by-office-id');
         $sid=null;
         //$jsonData = $sid->json();
         $jsonData=[];
         return $jsonData;
      } catch (\Throwable $th) {
         throw $th;
      }

   }

}
