<?php

namespace App\Http\Controllers;

abstract class Controller
{

    protected function getOperation($operator) {
        $operation = '';

        switch ($operator) {
            case '+':
                $operation = 'plus';
                 break;

            case '-':
                $operation = 'minus';
                break;

            case 'x':
                $operation = 'multiplication';
                break;

            case '/':
                $operation = 'division';
                break;
        }

        return $operation;
    }
}
