function setCode(node, str) {
    var code = Fly.wrap(node);
    code.innerText = str.trim();
    hljs.highlightBlock(code);
}
