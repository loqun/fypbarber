<?php

namespace App\Http\Controllers;
use App\Models\Shopstatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopstatusController extends Controller
{
    public static function getShopstatus(){

        $status = DB::table('shopstatus')->first();
        $name = $status->string;

        return $status; 



    }

    public function changeToEmpty(){

        $status = DB::table('shopstatus')->first();
        $status->string = "empty";
        $status->save();

    }
    public function changeToModerate(){

        $status = DB::table('shopstatus')->first();
        $status->string = "moderate";
        $status->save();

    }
    public function changeToBusy(){

        $status = DB::table('shopstatus')->first();
        $status->string = "busy";
        $status->save();
        
    }

    public function showStatus(){

        $status = DB::table('shopstatus')->first();

        return $status ;


    }





}
