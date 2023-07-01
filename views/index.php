<!DOCTYPE html>
<html lang="en">
  <?php 
    //$config['APP_TITLE'] = "Smruthi website";

    require('views/partials/head.php'); 
    ?>

  
  <body>
      <nav class="navbar">
        <div class="container-fluid d-flex justify-content-center">            
          <a class="navbar-brand" href="<?php echo route('')?>"
          >
            <img src="<?php echo assets('img/Smruthi.png')?>"
              alt="Smruthi Logo"
              class="img-fluid"/>
          </a>
        </div>
      </nav>

    <div class="container">

        <div class="d-flex justify-content-center">
            <div class="banner card rounded bg-smruthi border-0 px-3 py-4" id="randomSloka">

                <div class="d-flex justify-content-around">
                    <div class="details">
                        <div class="text-start">
                            <h2 class="fs-2 text-smruthi-1">Sloka of the Day</h2>
                            <div class="sloka text-smruthi-white fw-bold fs-7">कोन्वस्मिन्साम्प्रतं लोके गुणवान्कश्च वीर्यवान् ।
धर्मज्ञश्च कृतज्ञश्च सत्यवाक्यो दृढव्रत:।।1.1.2।।</div>                    
                            <div class="meaning text-smruthi-1 fs-8">Who in this world lives today endowed with excellent qualities, prowess, righteousness, gratitude, truthfulness and firmness in his vows?</div>
                        </div>
                    </div>
                    <div class="illustration">
                        <img src="<?php echo assets('img/rama1.svg')?>" alt="Sri Rama" class="img-fluid">
                    </div>
                </div>           
                <a href="<?php echo route('ramayanam/kanda-1-sarga-1-sloka-2');?>" class="btn btn-primary stretched-link opacity-0 p-0 m-0" style="height: 1px">Click Here</a>     
            </div>
        </div>
       
        <div class="namaskaram d-flex justify-content-center">
            <img src="<?php echo assets('img/namaskaram.svg');?>" alt="Namaskaram">
        </div>

        <div class="d-flex justify-content-center" id="reading">
            <div class="banner card rounded bg-smruthi-4 border-0" id="books">
                <div class="card-body d-flex justify-content-around">
                    <div class="details">
                        <div class="text-smruthi fs-4">Last Read</div>
                        <div class="book text-smruthi-black fw-bold">Valmiki Ramayanam</div>
                        <div class="id text-smruthi-grey fs-7 fw-bold">Bala Kanda, Sarga 18, Sloka 12</div>
                        <div class="sloka text-smruthi-black fs-8 mb-1">कौसल्या शुशुभे तेन पुत्रेणामिततेजसा।
यथा वरेण देवानामदितिर्वज्रपाणिना।।1.18.12।।</div> 
                    <a href="<?php echo route('read/last')?>" class="link-smruthi stretched-link text-decoration-none fw-bold">Continue Reading</a>

                    </div>
                    <div class="reading">
                        <img src="<?php assets('img/reading.gif')?>" alt="Reading" class="img-fluid float-end">
                    </div>
                </div>
            </div>
        </div>
        
        <h2 class="fs-2 text-smruthi mt-5 px-2">Books</h2>

        

        <div class="owl-carousel owl-theme mb-5 px-2" id="books">

                <div class="item me-4">
                    <div class="card rounded bg-smruthi-4 border-0 px-2">
                        <div class="card-body">
                            <div class="illustration mb-3">
                                <img src="<?php assets('img/gita.svg')?>" alt="illustration">
                            </div>
                                                
                            <div class="details">
                                <div class="title text-smruthi-black fw-bold text-nowrap">Srimad Bhagavad Gita</div>
                                <div class="text-smruthi-black fs-7">32% Complete</div>
                                <div class="progress bg-smruthi-2" role="progressbar" aria-label="Progress Bar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-smruthi" style="width: 32%"></div>
                                </div>                
                            </div>
                        </div>
                         
                        <a href="<?php echo route('gita');?>" class="btn btn-primary stretched-link opacity-0 p-0 m-0" style="height: 1px">Click Here</a>  
                    </div>
                </div>

                <div class="item me-4">
                    <div class="card rounded bg-smruthi-4 border-0 px-2">
                        <div class="card-body">
                            <div class="illustration mb-3">
                                <img src="<?php assets('img/ramayanam.png')?>" alt="illustration">
                            </div>
                                                
                            <div class="details">
                                <div class="title text-smruthi-black fw-bold text-nowrap">Valmiki Ramayanam</div>
                                <div class="text-smruthi-black fs-7">6% Complete</div>
                                <div class="progress bg-smruthi-2" role="progressbar" aria-label="Progress Bar" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-smruthi" style="width: 6%"></div>
                                </div>                
                            </div>
                        </div>
                        <a href="<?php echo route('ramayanam');?>" class="btn btn-primary stretched-link opacity-0 p-0 m-0" style="height: 1px">Click Here</a>
                    </div>
                </div>
                
        </div>

        <?php include('views/partials/footer.php') ?>

    </div>
    <script>
    $('.owl-carousel').owlCarousel({
        loop:false,
        items:2.1,
        responsive: false,
        autoWidth: true
    })
    </script>
    <script>
        active('.home')

        truncate('#randomSloka .meaning', 100)

        function truncate(elementSelector, maxLength) {
            const element = document.querySelector(elementSelector);
            
            if (!element) {
                console.error(`Element with selector "${elementSelector}" not found.`);
                return;
            }
            
            const content = element.textContent;
            
            if (content.length <= maxLength) {
                return;
            }
            const truncatedContent = content.slice(0, maxLength) + '...';
            element.textContent = truncatedContent;
        }
    </script>
  </body>
</html>


    