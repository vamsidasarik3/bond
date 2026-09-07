$pages = @('landing', 'landing-dark', 'landing-green')
foreach ($p in $pages) {
    $content = Get-Content "G:\xampp\htdocs\bond\public_html\$p\index.html" -Raw
    $pattern = '<img[^>]+src=["'']([^"'']+)["'']'
    $col = [System.Text.RegularExpressions.Regex]::Matches($content, $pattern)
    foreach ($m in $col) {
        $src = $m.Groups[1].Value
        if ($src.StartsWith('http') -or $src.StartsWith('data:')) { continue }
        $diskPath = "G:\xampp\htdocs\bond\public_html\$p\" + $src.Replace('/', '\')
        $pubPath = "G:\xampp\htdocs\bond\public_html\public\$p\" + $src.Replace('/', '\')
        $d = Test-Path $diskPath
        $pub = Test-Path $pubPath
        if (-not $d -or -not $pub) {
            Write-Host ("MISSING in " + $p + ": " + $src + " (disk: " + $d + ", pub: " + $pub + ")")
        }
    }
}
Write-Host "Done verification"
