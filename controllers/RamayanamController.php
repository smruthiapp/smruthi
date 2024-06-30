<?php

class Ramayanam{
    private $errors;
    public $verified;
    public $assigned_to;
    public $id;
    public $kanda;
    public $sarga;
    public $sloka;
    public $description;
    public $text;
    public $meaning;
    public $translation_en;
    public $translation_te;
    public $translation_ta;

    public $translation_hi;
    public $translation_ka;
    public $source;
    public $sort;
    public $next;
    public $prev;

    public function __construct()
    {
        $this->errors = "";
    }
    public function getSloka($kanda, $sarga, $sloka){
        
        DB::connect();
        $query = DB::select('ramayanam', '*', "kanda = '$kanda' and sarga = '$sarga' and sloka = '$sloka' ORDER BY sort ASC")->fetchAll();
        DB::close();
        return $query;
    }
    public function getSlokas($kanda, $sarga){
        
        DB::connect();
        $query = DB::select('ramayanam', '*', "kanda = '$kanda' and sarga = '$sarga' ORDER BY sort ASC")->fetchAll();
        DB::close();
        return $query;
    }

     public function getSlokaById($id){
        
        DB::connect();
        $query = DB::select('ramayanam', '*', "id = '$id' ")->fetchAll();
        DB::close();
        return $query;
    }

    public function updateSlokas($file)
{
    errors();
    $data = csv_decode($file); // Assuming csv_decode is a method within the same class
    $rows = [];
    foreach ($data as $row) {
        // Sort String
        $row['verified'] = ($row['verified'] == "TRUE") ? 1 : 0;
        $row['sort'] = $this->sortstr($row['id']);
        $row['next'] = $row['next'] . "";
        $row['prev'] = null;
        $getSloka = $this->getSloka($row['kanda'], $row['sarga'], $row['sloka']);

        $this->verified = $row['verified'];
        $this->assigned_to = $row['assigned_to'];
        $this->id = $row['id'];
        $this->kanda = $row['kanda'];
        $this->sarga = $row['sarga'];
        $this->sloka = $row['sloka'];
        $this->description = $row['description'];
        $this->text = $row['text'];
        $this->meaning = $row['meaning'];
        $this->translation_en = $row['translation_en'];
        $this->translation_te = $row['translation_te'];
        $this->translation_ta = $row['translation_ta'];
        $this->translation_hi = $row['translation_hi'];
        $this->translation_ka = $row['translation_ka'];
        $this->source = $row['source'];
        $this->sort = $row['sort'];
        $this->next = $row['next'];
        $this->prev = $row['prev'];

        $sloka = [
            'verified' => $this->verified,
            'assigned_to' => $this->assigned_to,
            'id' => $this->id,
            'kanda' => $this->kanda,
            'sarga' => $this->sarga,
            'sloka' => $this->sloka,
            'description' => $this->description,
            'text' => $this->text,
            'meaning' => $this->meaning,
            'translation_en' => $this->translation_en,
            'translation_te' => $this->translation_te,
            'translation_ta' => $this->translation_ta,
            'translation_hi' => $this->translation_hi,
            'translation_ka' => $this->translation_ka,
            'source' => $this->source,
            'sort' => $this->sort,
            'next' => $this->next,
            'prev' => $this->prev,
        ];

        if ($getSloka) {
            if ($this->verified) {
                DB::connect();
                $updateUser = DB::update('ramayanam', $sloka, "id = '$this->id'");
                DB::close();
            }
        } else {
            if ($this->verified) {
                DB::connect();
                $updateUser = DB::insert('ramayanam', $sloka);
                DB::close();
            }
        }
        array_push($rows, $this);
    }
    return $rows;
}


    public function sortstr($str){
        $splitIDs = explode(".", $str);
        return implode(".", array_map(function($splitID) {
            return str_pad($splitID, 3, "0", STR_PAD_LEFT);
        }, $splitIDs));
    }
}