<?php

class Gita{
    private $errors;

    public function __construct()
    {
        $this->errors = "";
    }
    public function getSloka($adhyaya, $sloka){
        
        DB::connect();
        $query = DB::select('gita', '*', "adhyaya = '$adhyaya' and sloka = '$sloka' ORDER BY sort ASC")->fetchAll();
        DB::close();
        return $query;
    }
    public function getSlokas($adhyaya){
        
        DB::connect();
        $query = DB::select('gita', '*', "adhyaya = '$adhyaya' ORDER BY sort ASC")->fetchAll();
        DB::close();
        return $query;
    }
}