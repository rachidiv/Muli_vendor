<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Filter implements ValidationRule
{
    protected $forbidden;
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     *
    
     */
    public function __construct($forbidden){
 $this->forbidden = $forbidden;
    }
//   public function passes($attribute,$value){
//     return ! in_array(strtolower($value),$this->forbidden);
//   }
//   public function message(){
//     return 'this value is not allowed';
//   }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

         if ( in_array(strtolower($value),$this->forbidden)) {
                 $fail('this name is forbidden'); 
         }
        // if (strtolower($value) == 'laravel') {
        //          $fail('this name is forbidden'); 
    // }
}
}