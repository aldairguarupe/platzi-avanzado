<?php

namespace App\Exceptions;

use Exception;

class InvalidScore extends Exception
{
    public function __construct(public readonly int $from, public readonly int $to)
    {
//        return response()->json(['score' => "Debes ingresar un valor que esté dentro de $from y $to"]);
    }

    public function render()
    {
        return response()->json(['score' => "Debes ingresar un valor que esté dentro de $this->from y $this->to"]);
    }
}
