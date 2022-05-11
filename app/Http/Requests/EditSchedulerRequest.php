<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSchedulerRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'scheduler_id' => 'required|exists:scheduler,id',
            'group_id' => 'exists:groups,id',
            'subject_id' => 'exists:subjects,id',
            'cabinet_id' => 'exists:cabinets,id'
        ];
    }
}
