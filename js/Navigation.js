var Navigation = (function() {
  'use strict';

  var MIN_WIDTH = 850;

  var _el;

  function _toggleMenu() {
    _el.style.display = _el.style.style.display === 'inline' ? '' : 'inline';
  }

  document.addEventListener('DOMContentLoaded', function() {
    _el = document.getElementById('navigation');
    document.getElementById('options').addEventListener('mouseup', _toggleMenu);
  });

  var me = {};

  me.hideMenu = function() {
    if (window.innerWidth <= MIN_WIDTH && _el.style.display === 'inline') {
      _el.style.display = '';
    }
  }

  return me;

}());