var Example = function(sel, str) {
    var code = this.code = Fly.wrap(sel);

    code.on('click', function(e) {
        code.addClass('large');
        e.cancelBubble = true;
    });

    document.addEventListener('click', function(e) {
        code.removeClass('large');
    }, true);

    if (typeof str === 'string') {
        this.setCode(str);
    }
};

Example.prototype.setCode = function(str) {
    this.code.innerText = str.trim();
    hljs.highlightBlock(this.code);
};
