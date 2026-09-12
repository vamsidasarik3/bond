<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$k = $app->make(Illuminate\Contracts\Console\Kernel::class);
$k->bootstrap();

echo "DB Host: " . config('database.connections.mysql.host') . "\n";
echo "DB Port: " . config('database.connections.mysql.port') . "\n";
echo "DB Name: " . config('database.connections.mysql.database') . "\n";
echo "DB User: " . config('database.connections.mysql.username') . "\n";

// Test actual connection
try {
    DB::connection()->getPdo();
    echo "DB Connection: SUCCESS\n";
} catch (Exception $e) {
    echo "DB Connection: FAILED — " . $e->getMessage() . "\n";
}
