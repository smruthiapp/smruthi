
        <div class="d-flex justify-content-center">
            <div class="banner card rounded bg-smruthi border-0 px-3 py-4" id="randomSloka">

                <div class="d-flex justify-content-around">
                    <div class="details">
                        <div class="text-start">
                            <h2 class="fs-4 text-smruthi-1">Sloka of the Day</h2>
                            <div class="text-smruthi-white fw-bold fs-7"><?php 
                            $sloka = "कोन्वस्मिन्साम्प्रतं लोके गुणवान्कश्च वीर्यवान् ।
                            धर्मज्ञश्च कृतज्ञश्च सत्यवाक्यो दृढव्रत:।।1.1.2।।";
                            echo lastTwoLines(removeEmptyLines($sloka)); ?></div>                    
                            <div class="meaning text-smruthi-1 fs-7">Who in this world lives today endowed with excellent qualities, prowess, righteousness, gratitude, truthfulness and firmness in his vows?</div>
                        </div>
                    </div>
                    <div class="illustration">
                        <img src="<?php echo assets('img/krishna1.svg')?>" alt="Sri Rama" class="img-fluid">
                    </div>
                </div>           
                <a href="<?php echo route('read/ramayanam/kanda/1/sarga/1/sloka/2');?>" class="btn btn-primary stretched-link opacity-0 p-0 m-0" style="height: 1px">Click Here</a>     
            </div>
        </div>
    