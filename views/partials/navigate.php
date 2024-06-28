<div class="offcanvas offcanvas-bottom mx-auto" tabindex="-1" id="navigateModal" aria-labelledby="navigateModalLabel"
    data-bs-backdrop="static">
    <div class="offcanvas-header px-4">

        <h5 class="offcanvas-title" id="navigateModalLabel">Navigate</h5>
        <button type="button" class="btn-close fs-7" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <h4 class="text-center fw-bold">


            <div class="text-start">
                <div class="mb-3">
                    <label for="adhyaya" class="fs-7">Adhyaya:</label>
                    <select id="adhyaya" name="adhyaya">
                        <?php foreach ($adhyayas as $adh): ?>
                            <option class="fs-7" value="<?php echo $adh['adhyaya']; ?>"><?php echo $adh['name']; ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>

                <div>

                    <label for="shloka" class="fs-7">Shloka:</label>
                    <select id="shloka" disabled>
                    </select>

                </div>

            </div>



        </h4>

        </div>
</div>

<script>
        $(document).ready(function() {
            var shlokas = <?php echo json_encode($shlokas); ?>;
            
            $('#adhyaya').change(function() {
                var adhyayaId = $(this).val();

                $('#shloka').empty().append('<option value="">Select Shloka</option>');
                if (adhyayaId) {
                    $('#shloka').prop('disabled', false);
                    shlokas.forEach(function(shloka, index) {
                        if (shloka['adhyaya'] == adhyayaId) {
                            $('#shloka').append('<option value="' + (index + 1) + '">' + shloka['text'] + '</option>');
                        }
                    });

                } else {
                    $('#shloka').prop('disabled', true);
                }
            });

            $('#shloka').change(function() {
                var shlokaId = $(this).val();
                if (shlokaId) {
                    var adhyayaId = $('#adhyaya').val();
                    var currentUrl = window.location.href;
                    var urlParts = currentUrl.split('/');
                    urlParts[urlParts.length - 1] = shlokaId;
                    urlParts[urlParts.length - 3] = adhyayaId;
                    var newUrl = urlParts.join('/');
                    window.location.href = newUrl;
                }
            });
        });
    </script>