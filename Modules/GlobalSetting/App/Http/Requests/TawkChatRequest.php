<?php

namespace Modules\GlobalSetting\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TawkChatRequest extends FormRequest
{
    public function rules()
    {
        return [
            'chat_link' => 'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'chat_link.required' => trans('translate.Chat link is required'),
        ];
    }
}
