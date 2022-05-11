<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MergeGroupsRequest extends FormRequest
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
            'first_group_id' => 'required|exists:groups,id',
            'second_group_id' => 'required|exists:groups,id'
        ];
    }
}
