var Code = (function() {

  var _el, _text;

  document.addEventListener('DOMContentLoaded', function() {
    _el = getElement('CODE');
    if (_el) {
      _text = _el.innerText;
      me.update({});
    }
  });

  var me = {};

  me.update = function(data) {
    _el.innerText = setTags(_text, data);
    hljs.highlightBlock(_el);
  };

  return me;

}());
