<div class="offcanvas offcanvas-bottom mx-auto" tabindex="-1" id="navigateModal" aria-labelledby="navigateModalLabel">
    <div class="offcanvas-header px-4">
        <h5 class="offcanvas-title" id="navigateModalLabel">Navigate</h5>
        <button type="button" class="btn-close fs-7" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="text-center row mt-2 mb-5">
            <div class="form-floating col-6">
                <!-- Adhyaya Dropdown-->
                <select id="adhyaya" name="adhyaya" class="form-select">
                    <!-- Options will be populated dynamically -->
                </select>
                <label for="adhyaya" class="ms-2 fs-7">Adhyaya</label>
            </div>
            <div class="form-floating col-6" id="sloka-container">
                <!-- Sloka Dropdown-->
                <select id="sloka" name="sloka" class="form-select">
                    <!-- Options will be populated dynamically -->
                </select>
                <label for="sloka" class="ms-2 fs-7">Sloka</label>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var adhyayas;

        // Fetch the JSON data
        fetch('<?php echo route("models/gita/index.json") ?>')
            .then(response => response.json())
            .then(data => {
                adhyayas = data;

                // Populate the Adhyaya dropdown
                var adhyayaSelect = document.getElementById('adhyaya');
                adhyayaSelect.innerHTML = '<option>Select Adhyaya</option>';
                adhyayas.forEach(adhyaya => {
                    var option = document.createElement('option');
                    option.value = adhyaya.adhyaya;
                    option.text = `${adhyaya.adhyaya} - ${adhyaya.transliteration}`;
                    adhyayaSelect.appendChild(option);
                });
            });

        document.getElementById('adhyaya').addEventListener('change', function () {
            var adhyayaId = this.value;
            var slokaSelect = document.getElementById('sloka');
            var slokaContainer = document.getElementById('sloka-container');
            slokaSelect.innerHTML = '<option>Select sloka</option>';

            if (adhyayaId) {
                slokaContainer.style.display = 'block';

                var selectedAdhyaya = adhyayas.find(adhyaya => adhyaya.adhyaya == adhyayaId);

                for (let i = 1; i <= selectedAdhyaya.slokas; i++) {
                    var option = document.createElement('option');
                    option.value = i;
                    option.text = i;
                    slokaSelect.appendChild(option);
                }
            } else {
                slokaContainer.style.display = 'none';
                slokaSelect.disabled = true;
            }
        });

        document.getElementById('sloka').addEventListener('change', function () {
            var slokaId = this.value;
            if (slokaId) {
                var adhyayaId = document.getElementById('adhyaya').value;
                var currentUrl = window.location.href;
                var urlParts = currentUrl.split('/');
                urlParts[urlParts.length - 1] = slokaId;
                urlParts[urlParts.length - 3] = adhyayaId;
                var newUrl = urlParts.join('/');
                window.location.href = newUrl;
            }
        });
    });
</script>