<div class="offcanvas offcanvas-bottom mx-auto" tabindex="-1" id="shareModal" aria-labelledby="shareModalLabel">
    <div class="offcanvas-header px-4">

        <h5 class="offcanvas-title" id="shareModalLabel">Share</h5>
        <button type="button" class="btn-close fs-7" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <h4 class="text-center fw-bold">
            Share it on your social apps
        </h4>

        <ul class="list-inline text-center mt-4">
            <li class="list-inline-item">
                <a href="https://wa.me?text=*<?php echo $config['APP_TITLE']; ?>*%0A%0A<?php echo $config['APP_DESC']; ?>%0A%0A<?php echo url(); ?>?utm_source=wa_share"
                    target="_blank" class="btn btn-outline-smruthi rounded-circle icon fs-4"
                    aria-label="whatsapp_share">
                    <i class="bi bi-whatsapp fs-6"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="https://www.facebook.com/sharer/sharer.php?quote=<?php echo $config['APP_TITLE']; ?>%0A%0A<?php echo $config['APP_DESC']; ?>%0A&u=<?php echo url(); ?>?utm_source=fb_share"
                    target="_blank" class="btn btn-outline-smruthi rounded-circle icon fs-4"
                    aria-label="facebook_share">
                    <i class="bi bi-facebook fs-6"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="https://twitter.com/intent/tweet?text=<?php echo $config['APP_TITLE']; ?>%0A%0A<?php echo $config['APP_DESC']; ?>%0A%0A<?php echo url(); ?>?utm_source=twitter_share"
                    target="_blank" class="btn btn-outline-smruthi rounded-circle icon fs-4" aria-label="twitter_share">
                    <i class="bi bi-twitter fs-6"></i>
                </a>
            </li>

            <li class="list-inline-item">
                <a href="https://t.me/share/url?text=<?php echo urlencode($config['APP_TITLE']); ?>%0A%0A<?php echo urlencode($config['APP_DESC']); ?>&url=<?php echo url(); ?>?utm_source=telegram_share"
                    target="_blank" class="btn btn-outline-smruthi rounded-circle icon fs-4"
                    aria-label="telegram_share">
                    <i class="bi bi-telegram fs-6"></i>
                </a>
            </li>


            <li class="list-inline-item">
                <a href="https://www.linkedin.com/cws/share?url=<?php echo url(); ?>?utm_source=linkedin_share"
                    target="_blank" class="btn btn-outline-smruthi rounded-circle icon fs-4"
                    aria-label="linkedin_share">
                    <i class="bi bi-linkedin fs-6"></i>
                </a>
            </li>
        </ul>

        <div class="my-4">
            <div class="input-group">
                <input type="url" class="form-control" id="url" value="<?php echo url(); ?>" readonly>
                <button class="btn btn-smruthi-plain btn-copy" onclick="copyToClipboard('#url')"><i
                        class="bi bi-files"></i> <span>Copy</span> </button>
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

                setTimeout(function () {
                    copyText.textContent = 'Copy';
                }, 2000);
            }
        </script>
    </div>
</div>