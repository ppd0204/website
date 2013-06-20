var GeoSearch = function(map, searchField) {

	var url = 'http://ws.geonames.org/searchJSON?q={query}&maxRows={limit}&lang={language}&username={username}';

	function xhr(url, callback) {
		var req = new XMLHttpRequest();
		req.onreadystatechange = function () {
			if (req.readyState !== 4) {
				return;
			}
			if (!req.status || req.status < 200 || req.status > 299) {
				return;
			}
			if (callback && req.responseText) {
				callback(JSON.parse(req.responseText));
			}
		};
		req.open('GET', url);
		req.send(null);
		return req;
	}

	function template(str, data) {
		return str.replace(/\{ *([\w_]+) *\}/g, function(tag, key) {
			return data[key] || tag;
		});
	}

    function onKeyUp(e) {
        if (e.keyCode === 13) {
            search();
        }
    }

	function onSearch() {
        searchField.removeEventListener('keyup', onKeyUp, null);
        searchField.removeEventListener('search', onSearch, null);
        searchField.addEventListener('search', search, null);
        search();
	}

	function search() {
        if (!searchField.value) {
            return;
        }
		xhr(template(url, {
			query: searchField.value,
            limit: 1,
			language: navigator.language,
			username: 'osmbuildings'
		}), onResults);
	}

    function onResults(res) {
        var item = res.geonames[0];
        if (!item) {
            searchField.style.backgroundColor = '#ffcccc';
        } else {
            searchField.style.backgroundColor = '#ffffff';
            map.setView([item.lat, item.lng], 14, false);
        }
	}

    searchField.placeholder = 'Search...';
    searchField.addEventListener('keyup', onKeyUp, null);
    searchField.addEventListener('search', onSearch, null);
};

//    notFoundMessage = options.notFoundMessage || 'Sorry, that address could not be found.';
//   .fadeIn('slow').delay(this._config.messageHideDelay).fadeOut('slow',
