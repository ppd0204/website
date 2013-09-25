var Navigation = function(el) {
  this.el = el;
  document.getElementById('options').addEventListener('mouseup', this.toggleMenu.bind(this));
};

var proto = Navigation.prototype;

proto.toggleMenu = function() {
  var thisElStyle = this.el.style
  thisElStyle.display = thisElStyle.style.display === 'inline' ? '' : 'inline';
};

proto.hideMenu = function() {
  var thisElStyle = this.el.style
  if (innerWidth <= 850 && thisElStyle.display === 'inline') {
    thisElStyle.display = '';
  }
};