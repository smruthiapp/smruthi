<!DOCTYPE html>
<html lang="en">
<?php
errors(1);

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
    <nav class="navbar mx-auto position-fixed fixed-top shadow-sm">
        <div class="container-fluid mx-2 mt-4 d-block">
            <a class="link-smruthi-grey text-decoration-none" href="<?php echo route('read/gita') ?>">
                <span class="fs-4">
                    <i class="bi bi-arrow-left"></i> 
                </span>
                <span class="text-smruthi font-smruthi">Saved Slokas</span>
            </a>
        </div>
    </nav>

    <div class="container" id="gita">
        <div class="py-5 px-2" id="gita">
            <?php if (!empty($slokas)) { ?>
                <ul class="list-group">
                    <?php
                    foreach ($slokas as $sloka) {
                    ?>
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
                    <?php
                    } ?>
                </ul>
            <?php } else { ?>
                No saved slokas found!
            <?php } ?>
        </div>
        <?php include('views/partials/footer.php') ?>
    </div>
</body>
</html>
