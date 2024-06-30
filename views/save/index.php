<!DOCTYPE html>
<html lang="en">
<?php
// errors(1);

if (!App::getSession())
  redirect('login');

$currentUser = App::getUser();

controller('Library');
$library = new Library;

$slokas = array();

if ($currentUser) {
    $slokas = $library->getSaved($currentUser['userID']);
}

// Uncomment these lines if necessary, or move them outside of PHP tags.
// $config['APP_TITLE'] = "Bhagavad Gita - Adhyaya ".$adhyaya['id']." - ".$adhyaya['name']." | ". $config['APP_NAME'];
// $config['APP_DESC'] = "Read Bhagavad Gita on our Smruthi App now. Adhyaya ".$adhyaya['id']." - ".$adhyaya['name']." (".$adhyaya['transliteration']."). ".$adhyaya['description'].".";

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

    <?php 
    if(App::getUser()) include('views/partials/reading.php');
?>
        

        <div class="heading">
            <h6 class="fs-7 text-smruthi-black mt-2 px-2 float"> Saved Slokas</h6>
            
        </div>

    <div class="container" id="gita">
        <div class="py-3 px-2" id="gita">
            <?php if (!empty($slokas)) { ?>
                <ul class="list-group">
                    <?php
                    foreach ($slokas as $sloka) {
                     
                     if(isset($sloka['adhyaya'])){
                    ?>
                        <h3 class="text-muted fs-7">Gita: Adhyaya
                            <?php echo $sloka['adhyaya'];?>, Sloka
                            <?php echo $sloka['sloka'];?>
                        </h3>
                        <a class="text-decoration-none mb-3" href="<?php echo route('read/gita/adhyaya/' . explode(".", $sloka['id'])[0] . '/sloka/' . explode(".", $sloka['id'])[1]); ?>">
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
                    <?php } if(isset($sloka['kanda'])){ ?>

                      <h3 class="text-muted fs-7">Ramayana: Kanda
                            <?php echo $sloka['kanda'];?>, Sarga
                            <?php echo $sloka['sarga'];?>, Sloka <?php echo $sloka['sloka'];?>
                            ?>
                        </h3>
                        <a class="text-decoration-none mb-3" href="<?php echo route('read/ramayanam/kanda/'.$sloka['kanda'].'/sarga/'.$sloka['sarga'].'/sloka/'.$sloka['sloka']) ?>">
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


                    <?php } } ?>
                </ul>
            <?php } else { ?>
                
                 <div class="mx-auto text-center">
                     <img src="<?php echo assets('img/Sri.Svg')?>"
              alt="Sri" width="250"
              class="img-fluid"/>

              <h6 class="text-muted">No Slokas Saved Yet</h6>
                 </div>

            <?php } ?>
        </div>
        <?php include('views/partials/footer.php') ?>
    </div>
</body>
</html>
