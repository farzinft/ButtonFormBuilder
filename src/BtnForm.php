<?php

namespace Farzin\BtnFormBuilder;

use Illuminate\Support\Facades\Facade;

class BtnForm extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new ButtonFormBuilder();
    }
}