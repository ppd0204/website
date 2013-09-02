function xhr(_url, param, callback) {
    var url = _url.replace(/\{ *([\w_]+) *\}/g, function(tag, key) {
        return param[key] || tag;
    });

    var req = 'XDomainRequest' in window ? new XDomainRequest() : new XMLHttpRequest();

    function changeState(state) {
        if ('XDomainRequest' in window && state !== req.readyState) {
            req.readyState = state;
            if (req.onreadystatechange) {
                req.onreadystatechange();
            }
        }
    }

    req.onerror = function() {
        req.status = 500;
        req.statusText = 'Error';
        changeState(4);
    };

    req.ontimeout = function() {
        req.status = 408;
        req.statusText = 'Timeout';
        changeState(4);
    };

    req.onprogress = function() {
        changeState(3);
    };

    req.onload = function() {
        req.status = 200;
        req.statusText = 'Ok';
        changeState(4);
    };

    req.onreadystatechange = function() {
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

    changeState(0);
    req.open('GET', url);
    changeState(1);
    req.send(null);
    changeState(2);

    return req;
}
