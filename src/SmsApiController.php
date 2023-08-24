<?php

namespace Arabi\RobiSMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SmsApiController extends Controller
{
    private static mixed $base_url, $username, $password, $sender_number;

    public function __construct ()
    {
        self::$base_url = config('robi_sms.base_url');
        self::$username = config('robi_sms.username');
        self::$password = config('robi_sms.password');
        self::$sender_number = config('robi_sms.sender_number');
    }

    /* handler for sending sms to single number */
    public static function SendTextMessage ($receiver, $message): Response
    {
        return Http::get(self::$base_url . '/SendTextMessage', [
            'Username' => self::$username,
            'Password' => self::$password,
            'From' => self::$sender_number,
            'To' => $receiver,
            'Message' => $message,
        ]);
    }
}
