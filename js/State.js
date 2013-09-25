var State = (function() {
  'use strict';

  function isStorable(n) {
    return typeof n !== 'object' && typeof n !== 'function' && n !== undefined && n !== null && n !== '';
  }

  function setUrlParams(data) {
    if (!history.replaceState) {
      return;
    }
    var k, v, params = [];
    for (k in data) {
      v = data[k];
      if (data.hasOwnProperty(k) && isStorable(v)) {
        params.push(encodeURIComponent(k) + '=' + encodeURIComponent(v));
      }
    }
    history.replaceState(data, '', '?'+ params.join('&'));
  }

  function getUrlParams(data) {
    var params;
    data = data || {};
    if (!(params = location.search)) {
        return data;
    }
    params = params.substring(1).replace( /(?:^|&)([^&=]*)=?([^&]*)/g, function ($0, $1, $2) {
      if ($1) {
        data[$1] = $2;
      }
    });
    return data;
  }

  function setLocalStorage(data) {
    var k, v;
    if (!localStorage.setItem) {
      return;
    }
    for (k in data) {
      v = data[k];
      if (data.hasOwnProperty(k) && isStorable(v)) {
        localStorage.setItem(k, v);
      }
    }
  }

  function getLocalStorage(data) {
    var k;
    data = data || {};
    if (!localStorage.getItem) {
      return data;
    }
    for (k in localStorage){
      data[k] = localStorage.getItem(k);
    }
    return data;
  }

  var me = {};

  me.save = function(data) {
    setLocalStorage(data);
    setUrlParams(data);
  };

  me.load = function() {
    var data = {};
    data = getLocalStorage(data);
    data = getUrlParams(data);
    return data;
  };

  return me;
}());
