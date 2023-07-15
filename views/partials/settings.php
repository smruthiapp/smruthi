<div class="offcanvas offcanvas-bottom mx-auto" tabindex="-1" id="settingsModal" aria-labelledby="settingsModalLabel"
    data-bs-backdrop="static">
    <div class="offcanvas-header px-4">

        <h5 class="offcanvas-title" id="settingsModalLabel">Settings</h5>
        <button type="button" class="btn-close fs-7" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <div class="text-center row">
            <div class="form-floating col-6">
            <!-- Language dropdown -->
            <select id="languageDropdown" class="form-select">
                <option value="en">English</option>
                <option value="te">Telugu</option>
                <option value="ta">Tamil</option>
                <option value="hi">Hindi</option>
                <option value="gu">Gujarati</option>
                <option value="or">Oriya</option>
            </select>
            <label for="languageDropdown" class=" ms-2 fs-7">Language</label>
            </div>
            <div class="form-floating col-6">
            <!-- Script dropdown -->
            <select id="scriptDropdown" class="form-select">
                <option value="devanagari">Devanagari</option>
                <option value="iast">English (iast)</option>
                <option value="hk">English (hk)</option>
                <option value="telugu">Telugu</option>
                <option value="tamil">Tamil</option>
                <option value="kannada">Kannada</option>
                <option value="malayalam">Malayalam</option>
                <option value="bengali">Bengali</option>
                <option value="gujarati">Gujarati</option>
            </select>
            <label for="scriptDropdown" class=" ms-2 fs-7">Script</label>
            </div>
        </div>

    </div>
</div>

