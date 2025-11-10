<?php

namespace Modules\SupportTicket\App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\SupportTicket\App\Models\MessageDocument;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class SupportTicketMessage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    public function documents(){
        return $this->hasMany(MessageDocument::class, 'message_id', 'id')->where('model_name', 'SupportTicketMessage');
    }

}
