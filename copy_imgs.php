<?php
$files = ['Web_03.png','Web_04.png','Web_006.png','Web_009.png','lay Out_new.png','Walk_22.png','Walk_33.png','Lay Out_1.png'];
foreach ($files as $f) {
    $src = __DIR__ . '/public/data/new images/' . $f;
    $dst = __DIR__ . '/public/images/' . $f;
    if (file_exists($src)) {
        copy($src, $dst);
        echo "Copied: $f\n";
    } else {
        echo "Not found: $src\n";
    }
}
