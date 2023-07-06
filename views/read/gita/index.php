<!DOCTYPE html>
<html lang="en">
<?php
$config['APP_TITLE'] = "Bhagavad Gita - Adhyayas | " . $config['APP_NAME'];

$config['APP_DESC'] = "Read Bhagavad Gita on our Smruthi App now. With easy to read interface, unravel the philosophy of life and the spiritual essence of the Bhagavad Gita in the most practical and systematic way.";

require('views/partials/head.php');
?>

<body>
    <nav class="navbar mx-auto position-fixed fixed-top shadow-sm">
        <div class="container-fluid mx-2 mt-4 d-block">
            <a class="link-smruthi-grey text-decoration-none" href="<?php echo route('read') ?>">
            
                <span class="fs-4">
                    <i class="bi bi-arrow-left"></i> 
                </span>
                <span class="text-smruthi font-smruthi">Bhagavad Gita</span>
            </a>
        </div>

        <div class="container-fluid mx-2 mt-3 d-block hideOnScroll">
            <div class="float-end fs-4 mt-3">

                <a href="#shareModal" class="link-smruthi-grey fw-bold me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#shareModal" aria-controls="shareModal" aria-label="Share"><i class="bi bi-share"></i></a>

                <?php include('views/partials/share.php');?>
                
            </div>

            <h2 class="text-smruthi fw-bold fs-4">Adhyayas</h2>
            <h3 class="text-smruthi-grey fs-5">Choose Adhyaya</h3>
        </div>
        
    </nav>

    <div class="container" id="gita">


        <div class="py-5 px-2" id="gita">


            <ul class="list-group">
                <?php
                $adhyayas = App::getIndex('gita');
                foreach ($adhyayas as $adhyaya) {

                    ?>
                    <a href="<?php echo route('read/gita/adhyaya/' . $adhyaya['id']) ?>"
                        class="adhyaya text-decoration-none mb-3">
                        <li class="list-group-item d-flex align-items-center border-0 border-bottom align-middle">

                            <div class="id">
                                <span class="badge bg-smruthi-4 text-smruthi float-start me-2">
                                    <?php echo $adhyaya['id']; ?>
                                </span>
                            </div>

                            <div class="flex-grow-1 ms-4">

                                <div class="name fw-bold">
                                    <?php echo $adhyaya['name']; ?>
                                </div>

                                <div class="transliteration text-smruthi-grey fs-7">
                                    <?php echo $adhyaya['transliteration']; ?>
                                </div>

                                <div class="slokas text-smruthi fw-bold fs-7">
                                    <i class="bi bi-list-task"></i>
                                    <?php echo $adhyaya['slokas']; ?> Slokas
                                </div>

                                <div class="description fs-8 fw-bold">
                                    <?php echo $adhyaya['description']; ?>
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