<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public static function generateIBAN(){
        $bankoKodas = 73000;
        $kontroliniaiSkaiciai = rand(0,9).rand(0,9);
        $senasNrArr = [];
        $n = 0;
        for($i=0; $i<11; $i++){
            $n = rand(0,9);
            array_push($senasNrArr, $n);
        }
        $senasNumeris = implode("", $senasNrArr);
        $saskaita = "LT".$kontroliniaiSkaiciai.$bankoKodas.$senasNumeris;
        return $saskaita;
    } 

}
