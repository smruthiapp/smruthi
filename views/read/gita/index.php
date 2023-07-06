<!DOCTYPE html>
<html lang="en">
<?php
$config['APP_TITLE'] = "Read Bhagavad Gita (Adhyayas)  - " . $config['APP_NAME'];

$config['APP_DESC'] = "Read Bhagavad Gita on our Smruthi App now. With easy to read interface, unravel the philosophy of life and the spiritual essence of the Bhagavad Gita in the most practical and systematic way.";

require('views/partials/head.php');
?>

<body>
    <nav class="navbar mx-auto position-fixed fixed-top shadow-sm">
        <div class="container-fluid mx-2 mt-4">
            <a class="float-start link-smruthi-grey text-decoration-none" href="<?php echo route('read') ?>">
            
                <h1 class="fs-4 font-smruthi">
                    <i class="bi bi-arrow-left"></i> 
                    <span class="text-smruthi font-smruthi">
                        Bhagavad Gita
                    </span>
                </h1>
            </a>
                
        </div>

        <style>
   

        </style>
        <div class="container-fluid mx-2 mt-3 d-block hideOnScroll">
            <div class="float-end fs-4 mt-3">

                 <a href="#shareModal" class="link-smruthi-grey fw-bold me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#shareModal" aria-controls="shareModal" aria-label="Share"><i class="bi bi-heart"></i></a>


                <a href="#shareModal" class="link-smruthi-grey fw-bold me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#shareModal" aria-controls="shareModal" aria-label="Share"><i class="bi bi-share"></i></a>


                <a href="#shareModal" class="link-smruthi-grey fw-bold me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#shareModal" aria-controls="shareModal" aria-label="Share"><i class="bi bi-three-dots-vertical"></i></a>


                <div class="offcanvas offcanvas-bottom mx-auto" tabindex="-1" id="shareModal" aria-labelledby="shareModalLabel" data-bs-backdrop="static">
                <div class="offcanvas-header px-4">
                    
                    <h5 class="offcanvas-title" id="shareModalLabel">Share</h5>
                    <button type="button" class="btn-close fs-7" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    
                    <h4><b>Share it with your friends</b></h4>
                   
                    <ul class="list-inline text-center mt-4">
                    <li class="list-inline-item">
                        <a href="https://wa.me?text=<?php echo $config['APP_DESC'];?>" class="btn btn-outline-smruthi rounded-circle icon fs-4">
                        <i class="bi bi-whatsapp fs-6"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-outline-smruthi rounded-circle icon fs-4">
                        <i class="bi bi-instagram fs-6"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-outline-smruthi rounded-circle icon fs-4">
                        <i class="bi bi-linkedin fs-6"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-outline-smruthi rounded-circle icon fs-4">
                        <i class="bi bi-facebook fs-6"></i>
                        </a>
                    </li>
                    </ul>

                    <div class="my-4">
                        <div class="input-group">
                            <input type="url" class="form-control" id="url" value="<?php echo url(); ?>" readonly>
                            <button class="btn btn-smruthi-plain btn-copy" onclick="copyToClipboard('#url')"><i class="bi bi-files"></i> <span>Copy</span> </button>
                        </div>
                    </div>

                    <script>
                        function copyToClipboard(selector) {
                            const input = document.querySelector(selector);
                            input.select();
                            input.setSelectionRange(0, 99999);
                            document.execCommand('copy');
                            
                            const copyText = document.querySelector('.btn-copy span');
                            copyText.textContent = 'Copied!';
                            
                            setTimeout(function() {
                                copyText.textContent = 'Copy';
                            }, 2000);
                        }
                    </script>
                </div>
                </div>


                
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

                                <div class="description fs-8">
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