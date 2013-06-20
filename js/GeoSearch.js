var GeoSearch = (function() {

	var _url = 'http://ws.geonames.org/searchJSON?q={query}&maxRows=1&lang={language}&username={username}';
	var _map, _searchField

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

	function processResults(res) {
	//    if (res.length === 0)
	//        throw this._config.notFoundMessage;
		console.log(res);
//      _map.setView([location.Y, location.X], ###zoomLevel, false);
	}

	var me = function(map, searchField) {
		_map = map;
		_searchField = searchField;
	}

	me.search = function() {
		xhr(template(_url, {
			q: searchField.value,
			language: en,
			username: 'osmbuildings'
		}), processResults);
	};

	return me;
}());

//    searchLabel = options.searchLabel || 'search for address...';
//    notFoundMessage = options.notFoundMessage || 'Sorry, that address could not be found.';
//    messageHideDelay = options.messageHideDelay || 3000;
//        .addListener(this._container, 'keypress', this._onKeyUp, this);

//    _printError: function(message) {
//            .fadeIn('slow').delay(this._config.messageHideDelay).fadeOut('slow',
//
//    _onKeyUp: function (e) {
//        var enterKey = 13;
//        else if (e.keyCode === enterKey) {
