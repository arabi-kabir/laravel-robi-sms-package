<?php

namespace Arabi\RobiSMS;

use Illuminate\Support\Facades\Facade;

class RobiSMS extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'robi-sms';
    }
}
