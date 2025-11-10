<?php

namespace Modules\CertificateBuilder\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CertificateBuilder\Database\factories\CertificateSettingFactory;

class CertificateSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

}
