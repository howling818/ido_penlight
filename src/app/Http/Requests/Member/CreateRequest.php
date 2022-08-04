<?php

namespace App\Http\Requests\Member;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class CreateRequest extends FormRequest
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
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'group_id' => ['required', 'integer', 'exists:m_idol_group, id'],
            'member_name' => ['required', 'string'],
            'birthday' => ['nullable', 'date'],
            'pen_light_id1' => ['required', 'exists:m_penlight, id'],
            'pen_light_id2' => ['nullable', 'exists:m_penlight, id'],
            'pen_light_id3' => ['nullable', 'exists:m_penlight, id'],
            'twitter'       => ['nullable', 'regex:/^[a-zA-Z0-9_]+$/'],
            'instagram'     => ['nullable', 'regex:/^[a-zA-Z0-9_.]+$/'],
            'tiktok'        => ['nullable', 'regex:/^[a-zA-Z0-9_.]+$/'],
            'Youtube'       => ['nullable', 'regex:/^[a-zA-Z0-9_]+$/'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $res = response()->json([
            'status' => 400,
            'errors' => $validator->errors()->toArray(),
        ], 400);
        throw new HttpResponseException($res);
    }

    /**
     * @return  Validator  $validator
     */
    public function getValidator()
    {
        return $this->getValidatorInstance();
    }
}
