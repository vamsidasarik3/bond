<?php
$srcManoj = __DIR__ . '/public/images/manoj-kumar-narravula.jpg';
$srcSrini = __DIR__ . '/public/images/srinivasa-rao-narravula.jpg';

if (!file_exists($srcManoj) || !file_exists($srcSrini)) {
    echo "Source images missing!\n";
    exit(1);
}

$imManoj = imagecreatefromjpeg($srcManoj);
$imSrini = imagecreatefromjpeg($srcSrini);

// Manoj: crop centered on his face and upper body
// Width 540, Height 675 (4:5 ratio)
// x: from 380, y: from 390
$cropManoj = imagecrop($imManoj, ['x' => 380, 'y' => 390, 'width' => 540, 'height' => 675]);

// Srinivasa: crop centered on his face and upper body
// Width 680, Height 850 (4:5 ratio)
// x: from 75, y: from 130
$cropSrini = imagecrop($imSrini, ['x' => 75, 'y' => 130, 'width' => 680, 'height' => 850]);

$destDirs = [
    __DIR__ . '/landing/images',
    __DIR__ . '/public/landing/images',
    __DIR__ . '/landing-green/images',
    __DIR__ . '/public/landing-green/images',
    __DIR__ . '/landing-dark/images',
    __DIR__ . '/public/landing-dark/images',
];

foreach ($destDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    imagejpeg($cropManoj, "$dir/manoj-kumar-narravula.jpg", 95);
    imagejpeg($cropSrini, "$dir/srinivasa-rao-narravula.jpg", 95);
    echo "Saved cropped photos to $dir\n";
}

echo "All cropped photos deployed successfully.\n";
