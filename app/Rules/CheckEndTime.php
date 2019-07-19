<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class CheckEndTime implements Rule
{
    
    public function passes($attribute, $value)
    {
        $dateNow = Carbon::now();
        $endDate = Carbon::now()->addDays(4);
        if (($value >= $dateNow) && ($value <= $endDate)) {
            return true;
        } else {
            return false;
        }
    }

    public function message()
    {
        return 'Chon ngay tra khong dung.';
    }
}
