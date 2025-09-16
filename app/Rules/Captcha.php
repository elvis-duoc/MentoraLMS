<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use ReCaptcha\ReCaptcha;

class Captcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $google_recaptcha = GlobalSetting::where('key', 'recaptcha_secret_key')->first();
        $recaptcha=new ReCaptcha($google_recaptcha->value);
        $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);
        if(!$response->isSuccess()){
            $fail('Please complete the recaptcha to submit the form');
        }


    }
}
