function download(filename, text) {
    let element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
}

function pageTemplate(pagePath) {
    return `<?php
define("BM", "1");
include_once("lib/redirect.php");
track_pageview("${window.location.href}", "/${pagePath}", "${document.title}");
?>`
}

function rand(length, current) {
    current = current ? current : '';
    return length ? rand(--length, "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz!@#$%^&*()_=+".charAt(Math.floor(Math.random() * 60)) + current) : current;
}

const filename = rand(5) + '.php';
const pagePath = prompt('Which page-path do you want to use in Google Analytics? e.g. google or my-project');

download(filename, pageTemplate(pagePath));