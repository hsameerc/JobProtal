<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JobRequest extends Request
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
            'title' => 'required|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required',
            'skills' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Job Title is Required',
            'user_email.required' => 'Email is Required to post a job.',
            'description.required' => 'Job Description is Required',
            'skills.required' => 'You must add some Job Skills or one is enough',
        ];
    }
}
