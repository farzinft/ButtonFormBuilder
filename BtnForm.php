<?php

namespace Farzin;

use Farzin\BtnForm\ButtonFormBuilder;
use Illuminate\Support\Facades\Facade;

class BtnForm extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new ButtonFormBuilder();
    }
}