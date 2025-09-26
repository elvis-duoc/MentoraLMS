<?php

namespace Modules\FAQ\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\FAQ\Database\factories\FaqFactory;

class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): FaqFactory{}

    protected $hidden = ['front_translate'];

    protected $appends = ['question', 'answer'];

    public function translate(){
        return $this->belongsTo(FaqTranslation::class, 'id', 'faq_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(FaqTranslation::class, 'id', 'faq_id')->where('lang_code', front_lang());
    }

    public function getQuestionAttribute(){
        return $this->front_translate?->question;
    }

    public function getAnswerAttribute(){
        return $this->front_translate?->answer;
    }


}
