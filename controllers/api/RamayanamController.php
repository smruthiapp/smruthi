<?php

class Ramayanam{
    private $errors;

    public function __construct()
    {
        $this->errors = "";
    }
    public function getSlokas($kanda, $sarga){
        
        DB::connect();
        $query = DB::select('ramayanam', '*', "kanda = '$kanda' and sarga = '$sarga' ORDER BY sort ASC")->fetchAll();
        DB::close();
        return $query;
    }
    public function getSloka($kanda, $sarga, $sloka){
        
        DB::connect();
        $query = DB::select('ramayanam', '*', "kanda = '$kanda' and sarga = '$sarga' and sloka = '$sloka' ORDER BY sort ASC")->fetchAll();
        DB::close();
        return $query;
    }

}