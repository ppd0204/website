(function(win) { 'use strict';

    var doc = document;

    var Fly = win.Fly = {};

    //*************************************************************************

    if (!String.prototype.trim) {
        String.prototype.trim = function() {
            return this.replace(/^\s*|\s*$/, 'g');
        };
    }

    //*************************************************************************

    Fly.enableEvents = function(obj) {

        obj.listeners = {};

        obj.on = function(type, handler) {
            (obj.listeners[type] = obj.listeners[type] || []);
            if (!~obj.listeners[type].indexOf(handler)) {
                obj.listeners[type].push(handler);
            }
        };

        obj.off = function(type, handler) {
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

        obj.once = function(type, handler) {
            obj.on(type, function wrapper(args) {
                obj.off(type, wrapper);
                handler(args);
            });
        };

        obj.emit = function(type, args) {
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

    //*************************************************************************

    var callbackId = 0;
    Fly.load = function(url, params, callback) {
		var docEl = doc.documentElement,
			callbackName = 'callback' + callbackId++,
			script = doc.createElement('script')
		;
		win[callbackName] = function(res) {
			delete win[callbackName];
			docEl.removeChild(script);
			callback && callback(res);
		};

		params = params || {};
		params.callback = callbackName

		docEl.insertBefore(script, docEl.lastChild).src = url.replace(/\{ *([\w_]+) *\}/g, function(x, key) {
			return params[key];
		});
	};

    //*************************************************************************

    Fly.setUrlParam = function(param) {
        if (!history.replaceState) {
            return;
        }

        var k, v,
            res = [];
        for (k in param) {
            v = param[k];
            if (param.hasOwnProperty(k) && typeof v != 'object' && typeof v != 'function') {
                res.push(encodeURIComponent(k) + '=' + encodeURIComponent(v));
            }
        }

        history.replaceState(param, '', '?' + res.join('&'));
    };

    Fly.getUrlParam = function() {
        var res = {},
            query = location.search.replace(/^\?+/, ''),
            param = query ? query.split('&') : [],
            pair;
        for (var i = 0, il = param.length; i < il; i++) {
            pair = param[i].split('=');
            res[ decodeURIComponent(pair[0]) ] = decodeURIComponent(pair[1]) || true;
        }
        return res;
    };

    //*************************************************************************

    Fly.wrap = function wrap(node) {
        if (!node || node.on) {
            return node;
        }

        if (typeof node === 'string') {
            return wrap(doc.querySelector(node));
        }

        node.addClass = function(className) {
            node.classList ? node.classList.add(className) : (node.className += ' ' + className);
        };

        node.removeClass = function(className) {
            node.classList ? node.classList.remove(className) : (node.className = (node.className.replace(new RegExp('\\s*\\b' + className + '\\b', 'g'), '')));
        };

        node.hasClass = function(className) {
            return node.classList ? node.classList.contains(className) : new RegExp('\\b' + className + '\\b').test(node.className);
        };

        node.remove = function() {
            node.parentNode.removeChild(node);
        };

        node.on  = node.addEventListener;
        node.off = node.removeEventListener;

        node.get = function(query) {
            return wrap(node.querySelector(query));
        };

        return node;
    }

    //*************************************************************************

    Fly.enableEvents(Fly);

    var resizeTimer;

    function onResize() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            Fly.emit('resize', { width:innerWidth, height:innerHeight });
        }, 50);
    }

    function onReady() {
        win.addEventListener('resize', onResize);
        Fly.emit('ready');
    }

    doc.addEventListener('DOMContentLoaded', onReady);

})(this);
