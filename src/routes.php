<?php

use Arabi\RobiSMS\SmsApiController;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return "test route";
});

Route::get('send-sms', [SmsApiController::class, 'SendTextMessage']);
