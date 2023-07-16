var localjs = (function() {
  var translations = {};
  var elements = [];
  var languageSelector;
  function init(selector, newTranslations) {
    translations = newTranslations;
    elements = document.getElementsByClassName("translate");
    languageSelector = document.querySelector(selector);
    storeOriginalText();
    attachEventListener();
    lexicalAnalyzer();
  }

  function storeOriginalText() {
    for (var i = 0; i < elements.length; i++) {
      var element = elements[i];
      element.dataset.originalHtml = element.innerHTML;
    }
  }

  function attachEventListener() {
    if (languageSelector) {
      languageSelector.addEventListener("change", lexicalAnalyzer);
    }
  }

  function lexicalAnalyzer() {
    var selectedLanguage = languageSelector.value;

    for (var i = 0; i < elements.length; i++) {
      var element = elements[i];
      var originalHtml = element.dataset.originalHtml;

      for (var word in translations) {
        if (originalHtml.includes(word)) {
          var regex = new RegExp("\\b" + word + "\\b", "g");
          var translation = translations[word][selectedLanguage];

          if (translation) {
            element.innerHTML = originalHtml.replace(regex, translation);
          }
        }
      }
    }
  }

  return {
    init: init
  };
})();