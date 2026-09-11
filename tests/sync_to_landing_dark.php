<?php
$base = dirname(__DIR__);
$src = $base . '/public/landing2';
$dst = $base . '/landing-dark';

copy("$src/index.html", "$dst/index.html");
copy("$src/css/style.css", "$dst/css/style.css");
copy("$src/js/main.js", "$dst/js/main.js");

echo "COPIED_SUCCESSFULLY: index.html (" . filesize("$dst/index.html") . " bytes), style.css (" . filesize("$dst/css/style.css") . " bytes), main.js (" . filesize("$dst/js/main.js") . " bytes)\n";
exit(0);
