<?php

namespace Modules\PaymentWithdraw\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\PaymentWithdraw\Database\factories\SellerWithdrawFactory;

class SellerWithdraw extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    public function seller(){
        return $this->belongsTo(User::class, 'seller_id');
    }
}
