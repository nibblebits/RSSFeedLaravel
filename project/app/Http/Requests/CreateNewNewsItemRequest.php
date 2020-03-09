<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;

class CreateNewNewsItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('creation-of-news');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:255',
            'description' => 'required|min:20|max:255',
            'url' => 'required|url|max:255|unique:news',
            'categories' => 'required'
        ];
    }
}
