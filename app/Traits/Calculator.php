<?php

namespace App\Traits;

    trait Calculator {

        public function plus(float $first_input, float $second_input){
            return   ($first_input + $second_input);
        }

        public function minus(float $first_input, float $second_input){
            return   ($first_input - $second_input);
        }

        public function multiplication(float $first_input, float $second_input){
            return   ($first_input * $second_input);
        }

        public function division(float $first_input, float $second_input){
            return $second_input != 0 ? ($first_input / $second_input) : 0;
        }

    }
?> 