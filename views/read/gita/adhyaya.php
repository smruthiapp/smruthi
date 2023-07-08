<!DOCTYPE html>
<html lang="en">
<?php
$adhyayas = App::getIndex('gita');
$adhyaya = $adhyayas[$_REQUEST['adhyaya']-1];
controller('Gita');
$slokas = new Gita;
$slokas = $slokas->getSlokas($adhyaya['id']);

$config['APP_TITLE'] = "Bhagavad Gita - Adhyaya ".$adhyaya['id']." - ".$adhyaya['name']." | ". $config['APP_NAME'];

$config['APP_DESC'] = "Read Bhagavad Gita on our Smruthi App now. Adhyaya ".$adhyaya['id']." - ".$adhyaya['name']." (".$adhyaya['transliteration']."). ".$adhyaya['description'].".";

require('views/partials/head.php');
?>

<body>
    <nav class="navbar mx-auto position-fixed fixed-top shadow-sm">
        <div class="container-fluid mx-2 mt-4 d-block">
            <a class="link-smruthi-grey text-decoration-none" href="<?php echo route('read/gita') ?>">
            
                <span class="fs-4">
                    <i class="bi bi-arrow-left"></i> 
                </span>
                <span class="text-smruthi font-smruthi">Bhagavad Gita</span>
            </a>
        </div>

        <div class="container-fluid hideOnScroll mx-2 mt-3 d-block">
            <div class="float-end fs-4 mt-3">

            <a href="#shareModal" class="link-smruthi-grey fw-bold me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#shareModal" aria-controls="shareModal" aria-label="Share"><i class="bi bi-share"></i></a>

            <?php include('views/partials/share.php');?>

            </div>

            <h2 class="text-smruthi fw-bold fs-4"><?php echo $adhyaya['name'];?></h2> 
            <h2 class="text-smruthi-grey fw-bold fs-6"><?php echo $adhyaya['transliteration'];?></h2>
            <h3 class="text-muted fs-7">Adhyaya <?php echo $adhyaya['id'];?> </h3>
        </div>

    </nav>

    <div class="container" id="gita">


        <div class="py-5 px-2" id="gita">


            <ul class="list-group">
                <?php
                foreach ($slokas as $sloka) {

                    ?>
                    <a href="<?php echo route('read/gita/adhyaya/'.explode(".", $sloka['id'])[0].'/sloka/' . explode(".", $sloka['id'])[1]) ?>"
                        class="text-decoration-none mb-3">
                        <li class="list-group-item d-flex align-items-center border-0 border-bottom align-middle">

                            <div class="id">
                                <span class="badge bg-smruthi-4 text-smruthi float-start me-2">
                                    <?php echo explode(".", $sloka['id'])[1]; ?>
                                </span>
                            </div>

                            <div class="flex-grow-1">

                                <div class="text-left fw-bold">
                                    <?php echo removeEmptyLines($sloka['text']); ?>

                                </div>


                            </div>

                            <div class="float-end">
                                <i class="bi bi-chevron-right"></i>
                            </div>

                        </li>
                    </a>

                    <?php
                } ?>
            </ul>
        </div>



        <?php include('views/partials/footer.php') ?>


    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var navHeight = document.querySelector('.fixed-top').offsetHeight
            document.querySelector('.container').style.paddingTop = navHeight + 'px'
        })
    </script>
</body>

</html>