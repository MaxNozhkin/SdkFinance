<?php namespace Nmax\SdkFinance\Facades;

use Illuminate\Support\Facades\Facade;

class SdkFinanceFacade extends Facade {

    protected static function getFacadeAccessor() { return 'sdkfinance'; }

}