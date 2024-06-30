<div class="d-flex justify-content-center">
    <div class="banner card rounded bg-smruthi border-0 px-3 py-4" id="randomSloka">

        <div class="d-flex justify-content-around">
            <div class="details">
                <div class="text-start">
                    <h2 class="fs-4 text-smruthi-1">Sloka of the Day</h2>
                    <div class="text-smruthi-white fw-bold fs-7 my-3"><?php
                    $sloka = "सञ्जय उवाच

                            दृष्ट्वा तु पाण्डवानीकं व्यूढं दुर्योधनस्तदा।
                            
                            आचार्यमुपसङ्गम्य राजा वचनमब्रवीत्।।1.2।।";
                    echo lastTwoLines(removeEmptyLines($sloka)); ?></div>
                    <a href="<?php echo route('read/gita/adhyaya/1/sloka/2'); ?>"
                        class="link-smruthi-1 fs-7 text-decoration-none stretched-link">Continue Reading</a>
                </div>
            </div>
            <div class="illustration">
                <img src="<?php echo assets('img/krishna1.svg') ?>" alt="Sri Rama" class="img-fluid">
            </div>
        </div>
    </div>
</div>