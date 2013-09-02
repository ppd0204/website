var GeoSearch = function(map, searchField) {

	var url = 'http://ws.geonames.org/searchJSON?q={query}&maxRows={limit}&lang={language}&username={username}';

  function onKeyDown(e) {
    var value = searchField.value;
    if (e.keyCode !== 13 || !value) {
      return;
    }

    searchField.blur(); // for iOS in order to close the keyboard
    e.preventDefault();

    if (value.indexOf('http') === 0) {
      customUrl = value;
      osmb.loadData(customUrl);
      saveMapState();
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
      searchField.style.backgroundColor = '#ffcccc';
    } else {
      searchField.style.backgroundColor = '#ffffff';
      map.setView([item.lat, item.lng], 15, false);
    }
	}

  searchField.placeholder = 'Search or URL...';
  searchField.addEventListener('keydown', onKeyDown, null);
};
