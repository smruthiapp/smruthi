<!DOCTYPE html>
<html>
<head>
  <title>Localization Example</title>
  <meta charset="UTF-8"> <!-- Add this line to specify the character encoding -->
</head>
<body>
  <h1 translate>Sloka of the Day</h1>
  <p translate>Today's sloka is a beautiful verse.</p>

  <h4 translate>Sloka of the Day</h4>

  <h2>Hello</h2>
  
  <div>
    <label for="languageSelector" translate>Select Language:</label>
    <select id="languageSelector">
      <option value="en">English</option>
      <option value="hi">Hindi</option>
      <option value="te">Telugu</option>
    </select>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@localjs/localjs@latest/localjs.min.js"></script>

  <script>
    var translations = {
      "Sloka of the Day": {
        "en": "Sloka of the Day",
        "hi": "आज का श्लोक",
        "te": "నేటి శ్లోకం"
      },
      "sloka is a beautiful verse": {
        "en": "sloka is a beautiful verse",
        "hi": "श्लोक एक सुंदर श्लोक है।",
        "te": "శ్లోకం ఒక అందమైన శ్లోకం."
      },
      "Select Language": {
        "en": "Select Language",
        "hi": "भाषा चुनिए",
        "te": "భాషను ఎంచుకోండి"
      }
    };

    var languageSelector = document.getElementById("languageSelector");
    var initialLanguage = languageSelector.value;

    localjs.init(initialLanguage, translations);

    languageSelector.addEventListener("change", function() {
      var selectedLanguage = languageSelector.value;
      localjs.update(selectedLanguage, translations);
    });
  </script>
</body>
</html>
