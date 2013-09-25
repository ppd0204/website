var Search = function(el) {

  var url = 'http://ws.geonames.org/searchJSON?q={query}&maxRows={limit}&lang={language}&username={username}';

  function onKeyDown(e) {
    var value = el.value;
    if (e.keyCode !== 13 || !value) {
      return;
    }

    el.blur(); // for iOS in order to close the keyboard
    e.preventDefault();

    if (value.indexOf('http') === 0) {
      customUrl = value;
      osmb.loadData(customUrl);
      map.saveState();
      return;
    }

    xhr(url, {
      query: value,
      limit: 1,
      language: navigator.language,
      username: 'osmbuildings'
    }, onResults);
	}

  function onResults(res) {
    var item = res.geonames[0];
    if (!item) {
      el.style.backgroundColor = '#ffcccc';
    } else {
      el.style.backgroundColor = '#ffffff';
//      map.setView([item.lat, item.lng], 15, false);
    }
	}

  el.placeholder = 'Search or URL...';
  el.addEventListener('keydown', onKeyDown, null);
  el.addEventListener('focus', nav.hideMenu);
};
