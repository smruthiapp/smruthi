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

    <div class="container" id="read">
<?php view('partials/reading');?>
        

        <div class="heading">
            <h2 class="fs-4 text-smruthi-black mt-5 px-2 float">Bhagavad Gita <a href="<?php echo route('read/gita');?>" class="link-smruthi fs-7 fw-bold text-decoration-none float-end">View All</a></h2>
            
        </div>
        
        <div class="owl-carousel owl-theme mb-5 px-2" id="gita">

        <?php for ($i=1; $i <= 18; $i++) {             
        ?>
            
            <div class="item me-4" id="adhyayam<?php echo $i?>">
                    <div class="card rounded bg-smruthi-4 border-0 px-2">
                        <div class="card-body">
                                                
                            <div class="details">
                                <div class="title text-smruthi-black fw-bold fs-7">Arjuna Vishada Yogam <?php echo $i?></div>
                                <div class="text-smruthi fw-bold fs-7">47 Slokas</div>
                            </div>
                            
                            <div class="illustration mb-3">
                                <img src="<?php assets('img/gita'.$i.'.svg')?>" alt="illustration">
                            </div>
                        </div>
                         
                        <a href="<?php echo route('read/gita/adhyayam-'.$i);?>" class="btn btn-primary stretched-link opacity-0 p-0 m-0" style="height: 1px">Click Here</a>  
                    </div>
                </div>

        <?php
        } ?>
        </div>

    

        <div class="heading">
            <h2 class="fs-4 text-smruthi-black mt-5 px-2 float">Valmiki Ramayanam <a href="<?php echo route('read/ramayanam');?>" class="link-smruthi fs-7 fw-bold text-decoration-none float-end">View All</a></h2>
            
        </div>
        
        <div class="owl-carousel owl-theme mb-5 px-2" id="ramayanam">

        <?php for ($i=1; $i <= 6; $i++) {             
        ?>
            
            <div class="item me-4" id="kanda<?php echo $i?>">
                    <div class="card rounded bg-smruthi-4 border-0 px-2">
                        <div class="card-body">
                                                
                            <div class="details">
                                <div class="title text-smruthi-black fw-bold fs-7">Kanda <?php echo $i?></div>
                                <div class="text-smruthi fw-bold fs-7">47 Slokas</div>
                            </div>
                            
                            <div class="illustration mb-3">
                                <img src="<?php assets('img/ramayanam'.$i.'.svg')?>" alt="illustration">
                            </div>
                        </div>
                         
                        <a href="<?php echo route('read/ramayanam/kanda-'.$i);?>" class="btn btn-primary stretched-link opacity-0 p-0 m-0" style="height: 1px">Click Here</a>  
                    </div>
                </div>

        <?php
        } ?>
        </div>

        
    <script>
    $('.owl-carousel').owlCarousel({
        loop:false,
        responsive: false,
        autoWidth: true,
        lazyLoad: true,
        autoplay: true,
        autoplayHoverPause:true,
    })
    </script>
    <script>
        truncate('#randomSloka .meaning', 100)

    </script>
        <?php include('views/partials/footer.php') ?>

    </div>
  </body>
</html>


    