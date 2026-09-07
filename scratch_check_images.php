<?php
$pages = ['landing', 'landing-dark', 'landing-green'];
foreach ($pages as $p) {
    $html = file_get_contents("G:/xampp/htdocs/bond/public_html/{$p}/index.html");
    preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $html, $m);
    foreach ($m[1] as $src) {
        if (strpos($src, 'http') === 0 || strpos($src, 'data:') === 0) continue;
        $diskPath = "G:/xampp/htdocs/bond/public_html/{$p}/{$src}";
        $pubPath = "G:/xampp/htdocs/bond/public_html/public/{$p}/{$src}";
        $disk = file_exists($diskPath);
        $pub = file_exists($pubPath);
        if (!$disk || !$pub) {
            echo "MISSING in {$p}: {$src} (disk: " . ($disk?'Y':'N') . ", pub: " . ($pub?'Y':'N') . ")\n";
        }
    }
}
echo "Done checking.\n";
