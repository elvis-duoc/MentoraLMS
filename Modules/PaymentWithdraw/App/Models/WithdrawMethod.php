<?php

namespace Modules\PaymentWithdraw\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\PaymentWithdraw\Database\factories\WithdrawMethodFactory;

class WithdrawMethod extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

}
