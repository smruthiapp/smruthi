<!DOCTYPE html>
<html lang="en">
<?php
errors(1);
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


$shlokas=$gita->getAllSlokas();


require('views/partials/head.php');
?>

<body>
    <nav class="navbar mx-auto position-fixed fixed-top shadow-sm">
        <div class="container-fluid mx-2 mt-4 d-block">
            <a class="link-smruthi-grey text-decoration-none"
                href="<?php echo route('read/gita/adhyaya/'.$sloka['adhyaya']) ?>">

                <span class="fs-4">
                    <i class="bi bi-arrow-left"></i>
                </span>
                <span class="text-smruthi font-smruthi">Bhagavad Gita</span>
            </a>
        </div>

        <div class="container-fluid mx-2 mt-3 d-block hideOnScroll">
            <div class="float-end fs-4 mt-3">

                <a href="#saveModal" class="link-smruthi-grey fw-bold me-3" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#saveModal" aria-controls="saveModal" aria-label="Share"><i
                        class="bi bi-heart"></i></a>


                <a href="#shareModal" class="link-smruthi-grey fw-bold me-3" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#shareModal" aria-controls="shareModal" aria-label="Share"><i
                        class="bi bi-share"></i></a>

                <?php include('views/partials/share.php');?>
                <?php include('views/partials/settings.php');?>
                <?php include('views/partials/save.php');?>
                <?php include('views/partials/navigate.php');?>


            </div>

            <h2 class="text-smruthi fw-bold fs-4">
                <?php echo $adhyaya['name'];?>
            </h2>
            <h2 class="text-smruthi-grey fw-bold fs-6">
                <?php echo $adhyaya['transliteration'];?>
            </h2>
            <h3 class="text-muted fs-7">Adhyaya
                <?php echo $sloka['adhyaya'];?>, Sloka
                <?php echo $sloka['sloka'];?>
            </h3>
        </div>

    </nav>

    <div class="container mb-5 pb-5" id="gita">


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
                <strong class="fs-5" id="text">
                    <?php echo removeEmptyLines($sloka['text']);?>
                </strong>
            </div>

            <div class="design">
                <div class="d2">
                    <img src="<?php assets('img/design.svg')?>" alt="Design" class="img-fluid">
                </div>
            </div>



            <div class="accordion my-3 mb-5" id="slokaAccordion">

                <div class="accordion-item border-0 my-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button rounded-pill mb-3 fw-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#translationContent" aria-expanded="true"
                            aria-controls="translationContent">
                            Translation
                        </button>
                    </h2>
                    <div class="accordion-collapse collapse show" id="translationContent">
                        <div class="accordion-body pt-2">
                            <div id="translation"><?php echo removeEmptyLines($sloka['translation_en'])?></div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 my-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed rounded-pill mb-3 fw-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#commentaryContent" aria-expanded="true"
                            aria-controls="commentaryContent">
                            Commentary
                        </button>
                    </h2>
                    
                    <div class="accordion-collapse collapse" id="commentaryContent">
                        <div class="accordion-body pt-2">
                            <div id="commentary"><?php echo removeEmptyLines($sloka['commentary_en'])?></div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="bg-smruthi-4 toolbar mx-auto pb-2 d-flex justify-content-between align-items-center px-5 pb-2">


            <a href="#" class="link-smruthi-grey fs-4 mx-2 order-1" id="settings" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#settingsModal" aria-controls="settingsModal"
                aria-label="settings"> <i class="settings"> <img src="<?php assets('img/translate.svg')?>" alt="Translate"></i> </a>




            <div class="d-flex justify-content-center align-items-center order-3">

                <a href="<?php echo route('read/gita/adhyaya/'.$prev[0].'/sloka/'.$prev[1])?>" class="link-smruthi mx-2"
                    <?php echo (empty($sloka['prev'])) ? 'disabled aria-disabled="true"' : 'aria-disabled="false"' ;?> id="prev"><i class="prev"> <img src="<?php assets('img/prev.svg')?>" alt="Previous"></i></a>


                <a href="#" class="bi bi-play-circle-fill link-smruthi mx-2" id="play"></a>
                <!-- Audio Element -->
                <audio id="audio-player" src="https://www.gitasupersite.iitk.ac.in/sites/default/files/audio/CHAP<?php echo $adhyaya['id']; ?>/<?php echo $adhyaya['id']; ?>-<?php echo $_REQUEST['sloka']; ?>.MP3"></audio>


                <a href="<?php echo route('read/gita/adhyaya/'.$next[0].'/sloka/'.$next[1])?>" class="link-smruthi mx-2"
                    <?php echo (empty($sloka['next'])) ? 'disabled aria-disabled="true"' : 'aria-disabled="false"' ;?> id="next"><i class="next"> <img src="<?php assets('img/next.svg')?>" alt="NextL"></i></a>
            </div>

            <a href="#" class="link-smruthi-grey fs-4 mx-2 order-4" id="navigate" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#navigateModal" aria-controls="navigateModal"
                aria-label="navigate">
                <i class="navigate"> <img src="<?php assets('img/navigate.svg')?>" alt="Navigate"></i> 
            </a>

        </div>




        <?php include('views/partials/footer.php') ?>
    </div>
    <script src="<?php assets('sanscript/sanscript.js')?>"></script>
    <script>
        let sloka = []
        sloka.id = "<?php echo $sloka['id'];?>"
        sloka.text = `<?php echo removeEmptyLines($sloka['text']);?>`
        sloka.translation = []
        sloka.translation.en = `<?php echo removeEmptyLines($sloka['translation_en']);?>`
        sloka.translation.te = `<?php echo removeEmptyLines($sloka['translation_te']);?>`
        sloka.translation.ta = `<?php echo removeEmptyLines($sloka['translation_ta']);?>`
        sloka.translation.hi = `<?php echo removeEmptyLines($sloka['translation_hi']);?>`
        sloka.translation.gu = `<?php echo removeEmptyLines($sloka['translation_gu']);?>`
        sloka.translation.or = `<?php echo removeEmptyLines($sloka['translation_or']);?>`
        sloka.commentary = []
        sloka.commentary.en = `<?php echo removeEmptyLines($sloka['commentary_en']);?>`
        sloka.commentary.te = `<?php echo removeEmptyLines($sloka['commentary_te']);?>`
        sloka.commentary.ta = `<?php echo removeEmptyLines($sloka['commentary_ta']);?>`
        sloka.commentary.hi = `<?php echo removeEmptyLines($sloka['commentary_hi']);?>`
        sloka.commentary.gu = `<?php echo removeEmptyLines($sloka['commentary_gu']);?>`
        sloka.commentary.or = `<?php echo removeEmptyLines($sloka['commentary_or']);?>`

        text = document.querySelector('#text')
        translation = document.querySelector('#translation')
        commentary = document.querySelector('#commentary')
    </script>


    <script>
        // Function to set a cookie with a given name, value, and expiration date
        function setCookie(name, value, days) {
            const expires = new Date();
            expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
            document.cookie = `${name}=${encodeURIComponent(value)};expires=${expires.toUTCString()};path=/`;
        }

        // Function to get a cookie value by name
        function getCookie(name) {
            const cookieArr = document.cookie.split("; ");
            for (let i = 0; i < cookieArr.length; i++) {
                const cookiePair = cookieArr[i].split("=");
                if (cookiePair[0] === name) {
                    return decodeURIComponent(cookiePair[1]);
                }
            }
            return null;
        }

        // Set the initial language selection from the stored cookie value
        let selectedLanguage = getCookie("selectedLanguage") || "en";
        let selectedScript = getCookie("selectedScript") || "devanagari";

        // Function to update the content based on the selected language
        function updateContent() {
            text.innerHTML = Sanscript.t(sloka.text, 'devanagari', selectedScript);
            translation.innerHTML = sloka.translation[selectedLanguage];
            commentary.innerHTML = sloka.commentary[selectedLanguage];
        }

        // Update the language dropdown with the selected language and add event listener
        const languageDropdown = document.querySelector("#languageDropdown");
        languageDropdown.value = selectedLanguage;
        languageDropdown.addEventListener("change", function () {
            selectedLanguage = languageDropdown.value;
            setCookie("selectedLanguage", selectedLanguage, 365); // Store the selected language in a cookie for 365 days
            updateContent();
            closeSettingsModal()
        });

        const scriptDropdown = document.querySelector("#scriptDropdown");
        scriptDropdown.value = selectedScript;
        scriptDropdown.addEventListener("change", function () {
            selectedScript = scriptDropdown.value;
            setCookie("selectedScript", selectedScript, 365); // Store the selected language in a cookie for 365 days
            updateContent();
            closeSettingsModal()
        });

        // Call the function initially to populate the content with the default or stored language
        updateContent();

    </script>
    <script>
        // Get the settings modal element
        const settingsModal = document.querySelector("#settingsModal");

        // Function to close the settings modal
        function closeSettingsModal() {
            document.querySelector('#settingsModal .btn-close').click()
        }

    </script>

    <script>
        let textFont = getCookie("textFont") || 4;
        setCookie("textFont", textFont, 365);
        let otherFont = getCookie("otherFont") || 4;
        setCookie("otherFont", otherFont, 365);

        text.className = 'fs-' + textFont
        translation.className = 'fs-' + otherFont
        commentary.className = 'fs-' + otherFont

        function changeTextFontSize(selector, action) {

            if (action === 1 && textFont < 8) {
                textFont = Number(textFont) + Number(action)
            } else if (action === -1 && textFont > 1) {
                textFont = Number(textFont) + Number(action)
            }
            text.className = 'fs-' + textFont
            setCookie("textFont", textFont, 365);
        }

        function changeOtherFontSize(selector, action) {

            if (action === 1 && otherFont < 8) {
                otherFont = Number(otherFont) + Number(action)
            } else if (action === -1 && otherFont > 3) {
                otherFont = Number(otherFont) + Number(action)
            }
            translation.className = 'fs-' + otherFont
            commentary.className = 'fs-' + otherFont
            setCookie("otherFont", otherFont, 365);
        }

    </script>

    <script>
    var touchStartX = 0;
        var touchEndX = 0;
        
        var next = document.querySelector('#next');
        var prev = document.querySelector('#prev');
        
        // Add event listeners for touch and drag events
        document.addEventListener('touchstart', handleTouchStart, false);
        document.addEventListener('touchmove', handleTouchMove, false);
        document.addEventListener('mousedown', handleMouseDown, false);
        document.addEventListener('mousemove', handleMouseMove, false);
        document.addEventListener('mouseup', handleMouseUp, false);
        
        // Function to handle touch start event
        function handleTouchStart(event) {
          touchStartX = event.touches[0].clientX;
        }
        
        // Function to handle touch move event
        function handleTouchMove(event) {
          touchEndX = event.touches[0].clientX;
          handleSwipe();
        }
        
        // Function to handle mouse down event
        function handleMouseDown(event) {
          touchStartX = event.clientX;
        }
        
        // Function to handle mouse move event
        function handleMouseMove(event) {
          touchEndX = event.clientX;
          handleSwipe();
        }
        
        // Function to handle mouse up event
        function handleMouseUp() {
          touchStartX = 0;
          touchEndX = 0;
        }
        
        // Function to handle swipe action
        function handleSwipe() {
          var minSwipeDistance = 180; // Minimum distance required to register as a swipe
        
          // Calculate the distance swiped
          var swipeDistance = touchEndX - touchStartX;
        
          // Check if the swipe distance is greater than the minimum required
          if (Math.abs(swipeDistance) >= minSwipeDistance) {
            if (swipeDistance > 0) {
              // Swipe to the right (previous action)
              triggerPreviousAction();
            } else {
              // Swipe to the left (next action)
              triggerNextAction();
            }
          }
        }
        
        // Function to trigger the previous action
        function triggerPreviousAction() {
          if(prev.ariaDisabled == "false"){ 
            prev.click();
          }
        }
        
        // Function to trigger the next action
        function triggerNextAction() {
          if(next.ariaDisabled == "false") next.click();
        }

        // play audio
        document.getElementById('play').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            var audio = document.getElementById('audio-player');
            var playButton = document.getElementById('play');

            if (audio.paused) {
                audio.play();
                playButton.classList.remove('bi-play-circle-fill');
                playButton.classList.add('bi-pause-circle-fill');
            } else {
                audio.pause();
                playButton.classList.remove('bi-pause-circle-fill');
                playButton.classList.add('bi-play-circle-fill');
            }
        });

        // Event listener to change the button icon when the audio ends
        document.getElementById('audio-player').addEventListener('ended', function() {
            var playButton = document.getElementById('play');
            playButton.classList.remove('bi-pause-circle-fill');
            playButton.classList.add('bi-play-circle-fill');
        });
        
    </script>


</body>

</html>