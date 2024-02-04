<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $categories = Category::pluck('id');
        return [
            'title'   => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
            'category_id' => ['required', Rule::in($categories)],
            'tags' => ['required', 'string', 'max:255'],
        ];
    }
}
