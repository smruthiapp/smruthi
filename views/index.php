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
<?php view('partials/banner');?>
        <div class="namaskaram d-flex justify-content-center">
            <img src="<?php echo assets('img/namaskaram.svg');?>" alt="Namaskaram">
        </div>

        
<?php view('partials/reading');?>
        
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
                         
                        <a href="<?php echo route('read/gita');?>" class="btn btn-primary stretched-link opacity-0 p-0 m-0" style="height: 1px">Click Here</a>  
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
                        <a href="<?php echo route('read/ramayanam');?>" class="btn btn-primary stretched-link opacity-0 p-0 m-0" style="height: 1px">Click Here</a>
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
        truncate('#randomSloka .meaning', 100)

    </script>
  </body>
</html>


    