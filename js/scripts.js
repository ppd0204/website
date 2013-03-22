//(function (global) {
//
//	var map,
//		searchURL = 'http://open.mapquestapi.com/nominatim/v1/search.php?format=json&json_callback={callback}&q={query}&addressdetails=1&limit=20&viewbox={left},{top},{right},{bottom}',
////		tilesURL = 'http://{s}.tiles.mapbox.com/v3/osmbuildings.map-c8zdox7m/{z}/{x}/{y}.png',
//		tilesURL = 'http://otile1.mqcdn.com/tiles/1.0.0/map/{z}/{x}/{y}.jpg',
//		osmbURL = 'server/?w={w}&n={n}&e={e}&s={s}&z={z}',
//        maxZoom = 18,
//		defaultState = { lat: 52.52111, lon: 13.40988, z: 17 },
//		doc = global.document,
//		$ = function (q) { return doc.querySelector(q); }
//	;
///*
//	function enableSearch(form) {
//		var input = form.elements[0];
//
//		form.addEventListener('submit', function (e) {
//			e.preventDefault();
//			e.stopPropagation();
//
//			if (!input.value) {
//	//			fireEvent('clear');
//				return;
//			}
//
//			var bbox = map.getBounds();
//
//			var params = {
//				query:  input.value,
//				left:   bbox._southWest.lon,
//				top:    bbox._northEast.lat,
//				right:  bbox._northEast.lon,
//				bottom: bbox._southWest.lat
//			};
//
//			JSON.load(searchURL, params, function (res) {
//				var cities = [];
//				for (var i = 0, il = res.length; i < il; i++) {
//					if (res[i].type === 'city') {
//						cities.push({
//							name: res[i].address.city,
//							country: res[i].address.country,
//							countryCode: res[i].address.country_code,
//							lat: parseFloat(res[i].lat),
//							lon: parseFloat(res[i].lon)
//						});
//					}
//				}
//				console.log(cities);
//			});
//		});
//	}
//
//	function zoomControls(el) {
//		if ('ongesturestart' in doc) {
//			el.style.display = 'none';
//			return;
//		}
//		el.children[0].addEventListener('mousedown', map.zoomOut.bind(map));
//		el.children[1].addEventListener('mousedown', map.zoomIn.bind(map));
//	}
//*/
//    function saveState() {
//        var center = map.getCenter();
//        var state = {
//            lat: center.lat.toFixed(5),
//            lon: center.lng.toFixed(5),
//            z: map.getZoom()
//        };
//        Fly.setUrlParam(state);
//    }
//
//	doc.addEventListener('DOMContentLoaded', function () {
//		map = new L.Map('map', { zoomControl: false });
//
//        var state = Fly.getUrlParam();
//        if (state.lat != undefined && state.lon != undefined && state.z != undefined) {
//            var zoom = Math.max(Math.min(parseInt(state.z, 10), maxZoom), 0);
//            map.setView([parseFloat(state.lat), parseFloat(state.lon)], zoom);
//        } else {
//            map.setView([defaultState.lat, defaultState.lon], defaultState.z);
//            saveState();
//        }
//
//		new L.TileLayer(tilesURL, { attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>', maxZoom: maxZoom }).addTo(map);
//		new L.BuildingsLayer({ url: osmbURL }).addTo(map);
//
//        map.on('moveend', saveState);
//        map.on('zoomend', saveState);
//
////		enableSearch($('#search'));
////		zoomControls($('.map-zoom'));
//	});
//
//})(this);

function setCode(node, str) {
    var code = Fly.wrap(node);
    code.innerText = str.trim();
    hljs.highlightBlock(code);
}
