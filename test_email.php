<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
try {
    \Illuminate\Support\Facades\Mail::raw('Test email', function ($msg) {
        $msg->to('mrbeasturdu16@gmail.com')->subject('Test Email');
    });
    echo 'Sent';
} catch (\Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
