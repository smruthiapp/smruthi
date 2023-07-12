<!DOCTYPE html>
<html lang="en">
<?php
$adhyayas = App::getIndex('gita');
$adhyaya = $adhyayas[$_REQUEST['adhyaya']-1];
controller('Gita');
$gita = new Gita;
$sloka = $gita->getSloka($_REQUEST['adhyaya'], $_REQUEST['sloka'])[0];

$slokaCount = $adhyaya['slokas'];
$prev =  ($sloka['sloka'] == 1) ? [0 => ($sloka['adhyaya'] - 1), 1 => $adhyayas[$sloka['adhyaya']-2]['slokas']] : [0 => $sloka['adhyaya'], 1 => $sloka['sloka'] - 1 ];
$next =  ($sloka['sloka'] >= $slokaCount) ? [0 => ($sloka['adhyaya'] + 1), 1 => 1] : [0 => $sloka['adhyaya'], 1 => $sloka['sloka'] +1 ];


$config['APP_TITLE'] = "Bhagavad Gita - Adhyaya ".$sloka['adhyaya'].", Sloka ".$sloka['sloka']." | ". $config['APP_NAME'];

$config['APP_DESC'] = "Read Bhagavad Gita on our Smruthi App now. ".$adhyaya['name']." (".$adhyaya['transliteration'].") - Adhyaya ".$sloka['adhyaya'].", Sloka ".$sloka['sloka'].". ".$adhyaya['description'].".";


require('views/partials/head.php');
?>

<body>
    <nav class="navbar mx-auto position-fixed fixed-top shadow-sm">
        <div class="container-fluid mx-2 mt-4 d-block">
            <a class="link-smruthi-grey text-decoration-none" href="<?php echo route('read/gita/adhyaya/'.$sloka['adhyaya']) ?>">
            
                <span class="fs-4">
                    <i class="bi bi-arrow-left"></i> 
                </span>
                <span class="text-smruthi font-smruthi">Bhagavad Gita</span>
            </a>
        </div>

        <div class="container-fluid mx-2 mt-3 d-block hideOnScroll">
            <div class="float-end fs-4 mt-3">

                <a href="#saveModal" class="link-smruthi-grey fw-bold me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#saveModal" aria-controls="saveModal" aria-label="Share"><i class="bi bi-heart"></i></a>

                <?php include('views/partials/save.php');?>

                <a href="#shareModal" class="link-smruthi-grey fw-bold me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#shareModal" aria-controls="shareModal" aria-label="Share"><i class="bi bi-share"></i></a>

                <?php include('views/partials/share.php');?>
                
                
            </div>

            <h2 class="text-smruthi fw-bold fs-4"><?php echo $adhyaya['name'];?></h2> 
            <h2 class="text-smruthi-grey fw-bold fs-6"><?php echo $adhyaya['transliteration'];?></h2>
            <h3 class="text-muted fs-7">Adhyaya <?php echo $sloka['adhyaya'];?>, Sloka <?php echo $sloka['sloka'];?> </h3>
        </div>
        
    </nav>

    <div class="container" id="gita">


        <div class="text-center py-5 px-2" id="gita">


        <?php
                $adhyayas = App::getIndex('gita');

                //print_r(removeEmptyLines($sloka['text']));
        ?>

            <div class="design">
                <div class="d1">
                    <img src="<?php assets('img/design.svg')?>" alt="Design" class="img-fluid">
                </div>
            </div>

            <div class="text my-2">
                <strong class="fs-5" id="text"><?php echo removeEmptyLines($sloka['text']);?></strong>
            </div>

            <div class="design">
                <div class="d2">
                    <img src="<?php assets('img/design.svg')?>" alt="Design" class="img-fluid">
                </div>
            </div>



            <div class="accordion my-3" id="slokaAccordion">

            <div class="accordion-item border-0 my-3">
                <h2 class="accordion-header">
                <button class="accordion-button rounded-pill fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#translation" aria-expanded="true" aria-controls="translation">
                    Translation
                </button>
                </h2>
                <div id="translation" class="accordion-collapse collapse show">
                <div class="accordion-body"><?php echo removeEmptyLines($sloka['translation_en'])?></div>
                </div>
            </div>
        
            <div class="accordion-item border-0 my-3">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed rounded-pill fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#commentary" aria-expanded="true" aria-controls="commentary">
                    Commentary
                </button>
                </h2>
                <div id="commentary" class="accordion-collapse collapse">
                <div class="accordion-body"><?php echo removeEmptyLines($sloka['commentary_en'])?></div>
                </div>
            </div>
        
        </div>

        </div>

        <div class="bg-smruthi-4 toolbar mx-auto pb-2 hideOnScroll d-flex justify-content-between align-items-center px-2 py-2">

    
    <a href="#" class="bi bi-gear-fill link-smruthi-grey fs-4 mx-2 order-1" id="settings" type="button" data-bs-toggle="offcanvas" data-bs-target="#settingsModal" aria-controls="settingsModal" aria-label="settings"></a>

    
    <?php include('views/partials/settings.php');?>

    
    <div class="d-flex justify-content-center align-items-center order-3">
    <a href="<?php echo route('read/gita/adhyaya/'.$prev[0].'/sloka/'.$prev[1])?>" class="link-smruthi mx-2" <?php echo (empty($sloka['prev'])) ? 'disabled' : '';?>><i class="bi bi-caret-left-fill fs-4"></i></a>
    <a href="#" class="bi bi-play-circle-fill link-smruthi mx-2" id="play"></a>
    <a href="<?php echo route('read/gita/adhyaya/'.$next[0].'/sloka/'.$next[1])?>" class="link-smruthi mx-2" <?php echo (empty($sloka['next'])) ? 'disabled' : '';?>><i class="bi bi-caret-right-fill fs-4"></i></a>
    </div>
    <a href="#" class="bi bi-compass link-smruthi-grey fs-4 mx-2 order-4" id="navigate"></a>
</div>




        <?php include('views/partials/footer.php') ?>
    </div>

    <script>
        let sloka = []
        sloka.id = "<?php echo $sloka['id'];?>"
        sloka.text = `<?php echo $sloka['text'];?>`
        sloka.translation = []
        sloka.translation.en = `<?php echo $sloka['translation_en'];?>`
        sloka.translation.te = `<?php echo $sloka['translation_te'];?>`
        sloka.translation.ta = `<?php echo $sloka['translation_ta'];?>`
        sloka.translation.hi = `<?php echo $sloka['translation_hi'];?>`
        sloka.translation.gu = `<?php echo $sloka['translation_gu'];?>`
        sloka.translation.or = `<?php echo $sloka['translation_or'];?>`
        sloka.commentary = []
        sloka.commentary.en = `<?php echo $sloka['commentary_en'];?>`
        sloka.commentary.te = `<?php echo $sloka['commentary_te'];?>`
        sloka.commentary.ta = `<?php echo $sloka['commentary_ta'];?>`
        sloka.commentary.hi = `<?php echo $sloka['commentary_hi'];?>`
        sloka.commentary.gu = `<?php echo $sloka['commentary_gu'];?>`
        sloka.commentary.or = `<?php echo $sloka['commentary_or'];?>`

        text = document.querySelector('#text')
        translation = document.querySelector('#translation')
        commentary = document.querySelector('#commentary')

    </script>

</body>

</html>