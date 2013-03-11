(function (window) { 'use strict';

    var Fly = window.Fly = {};

    Fly.enableEvents = function (obj) {

        obj.listeners = {};

        obj.on = function (type, handler) {
            (obj.listeners[type] = obj.listeners[type] || []);
            if (!~obj.listeners[type].indexOf(handler)) {
                obj.listeners[type].push(handler);
            }
        };

        obj.off = function (type, handler) {
            if (!obj.listeners[type]) {
                return;
            }
            if (!handler) {
                obj.listeners[type] = [];
                return;
            }
            var i = obj.listeners[type].indexOf(handler);
            if (i > -1) {
                obj.listeners[type].splice(i, 1);
            }
        };

        obj.once = function (type, handler) {
            obj.on(type, function wrapper(args) {
                obj.off(type, wrapper);
                handler(args);
            });
        };

        obj.trigger = function (type, args) {
            if (!obj.listeners[type]) {
                return;
            }
            var i = obj.listeners[type].length;
            while (i--) {
                if (obj.listeners[type][i](args) === false) {
                    return false;
                }
            }
        };
    };

	var callbackID = 0;
    Fly.load = function (url, params, callback) {
		var docEl = document.documentElement,
			callbackName = 'callback' + callbackID++,
			script = document.createElement('script')
		;
		window[callbackName] = function (res) {
			delete window[callbackName];
			docEl.removeChild(script);
			callback && callback(res);
		};

		params = params || {};
		params.callback = callbackName

		docEl.insertBefore(script, docEl.lastChild).src = url.replace(/\{ *([\w_]+) *\}/g, function (x, key) {
			return params[key];
		});
	};

    Fly.setUrlParam = function (param) {
        var k, v,
            res = [];
        for (k in param) {
            v = param[k];
            if (param.hasOwnProperty(k) && typeof v != 'object' && typeof v != 'function') {
                res.push(encodeURIComponent(k) + '=' + encodeURIComponent(v));
            }
        }

        if (history.replaceState) {
            history.replaceState(param, '', '?' + res.join('&'));
        }
    };

    Fly.getUrlParam = function () {
        var res = {},
            query = location.search.replace(/^\?+/, ''),
            param = query.split('&'),
            pair
        ;
        for (var i = 0, il = param.length; i < il; i++) {
            pair = param[i].split('=');
            res[ pair[0] ] = pair[1] || true;
        }
        return res;
    };

})(this);
