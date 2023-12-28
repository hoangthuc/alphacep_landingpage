<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'work_order_reference' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'work_order_reference.required' => 'Nội dung bình luận phải có độ dài ngắn hơn 255 kí tự'
        ];
    }



}
