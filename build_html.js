const fs = require('fs');
const src = 'g:/xampp/htdocs/bond/public_html/public_html/landing2/index.html';
const dst = 'g:/xampp/htdocs/bond/public_html/public_html/index.html';

let html = fs.readFileSync(src, 'utf8');
html = html
  .replaceAll('="images/', '="landing2/images/')
  .replaceAll("='images/", "='landing2/images/")
  .replaceAll('content="images/', 'content="landing2/images/')
  .replaceAll("url('images/", "url('landing2/images/")
  .replaceAll('url("images/', 'url("landing2/images/')
  .replaceAll('="css/', '="landing2/css/')
  .replaceAll('="js/', '="landing2/js/')
  .replaceAll('https://navagruha.com/landing2/', 'https://rrrprekshitha.navagruha.com/');

fs.writeFileSync(dst, html, 'utf8');
console.log('INDEX_HTML_GENERATED_SUCCESSFULLY: ' + html.length + ' bytes written.');
