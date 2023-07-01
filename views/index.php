<!DOCTYPE html>
<html lang="en">
  <?php 
    $config['APP_TITLE'] = "Smruthi website";

    require('views/partials/head.php'); 
    ?>

    <style>
        body {
            max-width: 440px; /* Set the maximum width to match a mobile device */
            margin: 0 auto; /* Center the content horizontally */
        }
        .navbar-brand img{
            max-height: 140px;
        }

        .sloka{
            white-space: pre-wrap;
        }
        .fs-7{
            font-size: 14px;
        }
        .fs-8{
            font-size: 12px;
        }
        .rounded{
            border-radius: 20px !important;
        }
        .banner{
            width: 90vw !important;
        }

        #randomVerse .illustration img {
            position: absolute;
            right: -10px;
            top: -40px;
            max-height: 200px;
            float: right;
        }

        .namaskaram img{
            max-height: 30vw;
        }
        .reading img{
            max-height: 16vw;
        }

        .card-box{
            min-width: 250px;
            min-height: 230px;
        }
        .card-box .title{
            height: 20px;
            line-height: 1.2;
        }
        .card-box .illustration{
            text-align: center;
        }
        .card-box .illustration img{
            height: 140px;
        }

    </style>

  <body>
      <nav class="navbar">
        <div class="container-fluid d-flex justify-content-center">            
          <a class="navbar-brand" href="#"
          >
            <img src="<?php echo assets('img/Smruthi.png')?>"
              alt="Smruthi Logo"
              class="img-fluid"/>
          </a>
        </div>
      </nav>

    <div class="container">

        <div class="d-flex justify-content-center">
            <div class="banner card rounded bg-smruthi border-0 px-3 py-4" id="randomVerse">

                <div class="row">
                    <div class="verse col-9">
                        <div class="text-start">
                            <h2 class="fs-2 text-smruthi-1">Verse of the Day</h2>
                            <div class="sloka text-smruthi-white fw-bold fs-7">कोन्वस्मिन्साम्प्रतं लोके गुणवान्कश्च वीर्यवान् ।
धर्मज्ञश्च कृतज्ञश्च सत्यवाक्यो दृढव्रत:।।1.1.2।।</div>                    
                            <div class="meaning text-smruthi-1 fs-8">Who in this world lives today endowed with excellent qualities, prowess, righteousness, gratitude, truthfulness and firmness in his vows?</div>
                        </div>
                    </div>
                    <div class="illustration col">
                        <img src="<?php echo assets('img/rama1.png')?>" alt="Sri Rama" class="img-fluid">
                    </div>
                </div>           
                <a href="#" class="btn btn-primary stretched-link opacity-0 p-0 m-0" style="height: 1px">Go somewhere</a>     
            </div>
        </div>
        <div class="namaskaram d-flex justify-content-center">
            <img src="<?php echo assets('img/namaskaram.svg');?>" alt="Namaskaram">
        </div>

        <div class="d-flex justify-content-center" id="reading">
            <div class="banner card rounded bg-smruthi-2 border-0 px-2" id="randomVerse">
                <div class="card-body row">
                    <div class="verse col-8">
                        <div class="text-smruthi fs-4">Last Read</div>
                        <div class="book text-smruthi-black fw-bold">Valmiki Ramayanam</div>
                        <div class="id text-smruthi-grey fs-7 fw-bold">Bala Kanda, Sarga 18, Sloka 12</div>
                        <div class="sloka text-smruthi-black fs-8 mb-1">कौसल्या शुशुभे तेन पुत्रेणामिततेजसा।
यथा वरेण देवानामदितिर्वज्रपाणिना।।1.18.12।।</div> 
                    <a href="#" class="link-smruthi stretched-link text-decoration-none fw-bold">Continue Reading</a>

                    </div>
                    <div class="reading col">
                        <img src="<?php assets('img/reading.gif')?>" alt="Reading" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        
        <h2 class="fs-2 text-smruthi mt-5">Books</h2>
        <div class="d-flex" id="books">

            <div class="card-box card rounded bg-smruthi-1 border-0 px-2 me-3" id="gita">
                <div class="card-body d-block">
                
                    <div class="illustration mb-3">
                        <img src="<?php assets('img/gita.png')?>" alt="illustration">
                    </div>
                    <div class="verse">
                        <div class="title text-smruthi-black fw-bold">Srimad Bhagavad Gita</div>
                        <div class="text-smruthi-black fs-7">32% Complete</div>
                        <div class="progress" role="progressbar" aria-label="Progress Bar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 32%"></div>
                        </div>                
                    </div>
                </div>
                <a href="#" class="btn btn-primary stretched-link opacity-0 p-0 m-0" style="height: 1px">Go somewhere</a>   
            </div>

            <div class="card-box card rounded bg-smruthi-1 border-0 px-2 me-3" id="ramayanam">
                <div class="card-body d-block">
                
                    <div class="illustration mb-3">
                        <img src="<?php assets('img/ramayanam.png')?>" alt="illustration">
                    </div>
                    <div class="verse">
                        <div class="title text-smruthi-black fw-bold">Valmiki Ramayanam</div>
                        <div class="text-smruthi-black fs-7">6% Complete</div>
                        <div class="progress" role="progressbar" aria-label="Progress Bar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 6%"></div>
                        </div> 
                
                    </div>
                </div>
                <a href="#" class="btn btn-primary stretched-link opacity-0 p-0 m-0" style="height: 1px">Go somewhere</a>   
            </div>
        </div>
        
    </div>
  </body>
</html>
