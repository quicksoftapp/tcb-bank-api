<?php

namespace Quicksoftapp\TCBBankAPI\Facades;

use Illuminate\Support\Facades\Facade;

class TCBBankAPI extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tcb-bank';
    }
}
