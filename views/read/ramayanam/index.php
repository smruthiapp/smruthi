<!DOCTYPE html>
<html lang="en">
<?php
$config['APP_TITLE'] = "Valmiki Ramayanam - Kandas | " . $config['APP_NAME'];

$config['APP_DESC'] = "Read Valmiki Ramayanam on our Smruthi App now. With easy to read interface, unravel the philosophy of life and the spiritual essence of the Valmiki Ramayanam in the most practical and systematic way.";

require('views/partials/head.php');
?>

<body>
    <nav class="navbar mx-auto position-fixed fixed-top shadow-sm">
        <div class="container-fluid mx-2 mt-4 d-block">
            <a class="link-smruthi-grey text-decoration-none" href="<?php echo route('read') ?>">
            
                <span class="fs-4">
                    <i class="bi bi-arrow-left"></i> 
                </span>
                <span class="text-smruthi font-smruthi">Valmiki Ramayanam</span>
            </a>
        </div>

        <div class="container-fluid mx-2 mt-3 d-block hideOnScroll">
            <div class="float-end fs-4 mt-3">

                <a href="#shareModal" class="link-smruthi-grey fw-bold me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#shareModal" aria-controls="shareModal" aria-label="Share"><i class="bi bi-share"></i></a>

                <?php include('views/partials/share.php');?>
                
            </div>

            <h2 class="text-smruthi fw-bold fs-4">Kandas</h2>
            <h3 class="text-smruthi-grey fs-5">Choose Kanda</h3>
        </div>
        
    </nav>

    <div class="container" id="gita">


        <div class="py-5 px-2" id="gita">
        <center>
            <h1>Coming Soon</h1>
        </center>
        </div>



        <?php include('views/partials/footer.php') ?>


</div>

</body>

</html>