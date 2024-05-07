<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Calculator;

class CalculatorController extends Controller
{
    use Calculator;

    private $first_input;
    private $second_input;
    private $operator;

    public function __construct(Request $request) {

        // Get all data from frontend via request
        $this->first_input = $request->calculator['first_input'];
        $this->second_input = $request->calculator['second_input'];
        $this->operator = $request->calculator['operator'];
        
    }

    
    public function index(){

        // Find which operation based on the operator
        $operation = self::getOperation( $this->operator );

        return  $this->$operation( (float)$this->first_input,  (float)$this->second_input);

    }
}
