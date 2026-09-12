<?php
$sourcePath = 'g:/xampp/htdocs/bond/public_html/public_html/landing2/index.html';
$destPath = 'g:/xampp/htdocs/bond/public_html/public_html/index.html';

$html = file_get_contents($sourcePath);

// Replace relative assets to point to landing2/
$replacements = [
    '="images/' => '="landing2/images/',
    "='images/" => "='landing2/images/",
    'content="images/' => 'content="landing2/images/',
    "url('images/" => "url('landing2/images/",
    'url("images/' => 'url("landing2/images/',
    'url(images/' => 'url(landing2/images/',
    '="css/' => '="landing2/css/',
    '="js/' => '="landing2/js/',
    'https://navagruha.com/landing2/' => 'https://rrrprekshitha.navagruha.com/',
];

$converted = str_replace(array_keys($replacements), array_values($replacements), $html);

file_put_contents($destPath, $converted);
echo "SUCCESS: Wrote " . strlen($converted) . " bytes to " . $destPath . "\n";
