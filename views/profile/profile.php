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
            <h6 class="fs-7 text-smruthi-black mt-2 px-2 float"> Profile</h6>
            
        </div>

    <div class="container" id="gita">
        <div class="py-3 px-2" id="gita">
            <a href="<?php echo route('logout'); ?>" class="btn btn-primary">Logout</a>
        </div>
        <?php include('views/partials/footer.php') ?>
    </div>
</body>
</html>
