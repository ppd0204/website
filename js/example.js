document.addEventListener('DOMContentReady', function () {
    var code = document.querySelector('#code');
    var src = document.querySelector('#src');

    code.addEventListener('click', function (e) {
        this.className += ' large';
        e.cancelBubble = true;
    });

    document.addEventListener('click', function () {
        code.className = code.className.replace(/ large/g, '');
    });

    code.innerText = src.innerText;
    hljs.highlightBlock(code);
});
