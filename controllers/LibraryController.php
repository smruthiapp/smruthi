<?php

class Library{
    public $error;
    public $errorMsgs;

    protected $userID;
    protected $slokaID;
    protected $book;

    public function save($userID, $slokaID,$book){


        
        DB::connect();
        $this->userID=$userID;
        $this->slokaID=$slokaID;
        $this->book=$book;
        DB::close();

            $data = array(
                'userID' => $this->userID,
                'slokaID' => $this->slokaID,
                'book' => $this->book,
                'savedAt' => date('Y-m-d H:i:s'),
            );

            $isLiked=$this->isLiked($userID, $slokaID,$book);


            if(!$isLiked){
                
                DB::connect();
                $saveSloka = DB::insert('library', $data);
                DB::close();

                if ($saveSloka) {
                    $this->error = false;
                    $this->errorMsgs['saveSloka'] = '';
                } else {
                    $this->error = true;
                    $this->errorMsgs['saveSloka'] = 'Save operation failed';
                }

                if ($this->error) {
                    return ['error' => $this->error, 'errorMsgs' => $this->errorMsgs];
                } else {
                    return ['error' => $this->error, 'errorMsgs' => $this->errorMsgs, 'message' => 'Saved successfully'];
                }
            }

         
    }


    public function remove($userID, $slokaID,$book){
        
        DB::connect();
        $this->userID=$userID;
        $this->slokaID=$slokaID;
        $this->book=$book;

            $data = array(
                'userID' => $this->userID,
                'slokaID' => $this->slokaID,
                'book' => $this->book,
                'savedAt' => date('Y-m-d H:i:s'),
            );

         $unSave = DB::delete('library', "userID = '$userID' and slokaID = '$slokaID' and book = '$book' ");
         DB::close();

          if ($unSave) {
                $this->error = false;
                $this->errorMsgs['unSave'] = '';
            } else {
                $this->error = true;
                $this->errorMsgs['unSave'] = 'Unsave operation failed';
            }

            if ($this->error) {
                return ['error' => $this->error, 'errorMsgs' => $this->errorMsgs];
            } else {
                return ['error' => $this->error, 'errorMsgs' => $this->errorMsgs, 'message' => 'Unsaved successfully'];
            }
    }

     public function isLiked($userID, $slokaID,$book){
        
        DB::connect();
        $this->userID=$userID;
        $this->slokaID=$slokaID;
        $this->book=$book;

         $saveSloka = DB::select('library','*',"userID = '$userID' and slokaID = '$slokaID' and book = '$book' ")->fetchAll();
         DB::close();

        if ($saveSloka) {
            return true;
        } else {
            return false;
        }

    }


     public function getSaved($userID){

        controller('Gita');
        controller('Ramayanam');

        DB::connect();
        $this->userID=$userID;

         $saveSloka = DB::select('library','*',"userID = '$userID' ")->fetchAll();
         DB::close();

         // Initialize an empty array to store all slokas
        $allSlokas = [];

        // Iterate through each row
        foreach ($saveSloka as $row) {
            // Get the book name from the current row
            $book = $row['book'];
            $id = $row['slokaID'];
            
            if($book == "gita"){
                // Fetch slokas for the current book
                $gita = new Gita;
                $sloka = $gita->getSlokaById($id);

            }
            else if($book == "ramayanam"){
                // Fetch slokas for the current book
                $ramayanam = new ramayanam;
                $sloka = $ramayanam->getSlokaById($id);
            }
            // Merge the fetched slokas into the allSlokas array
            $allSlokas = array_merge($allSlokas, $sloka);
        }



        return $allSlokas;

    }


}