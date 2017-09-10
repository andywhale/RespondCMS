<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Content;

class ContentFormRequest extends FormRequest
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
            'title' => 'required|min:3', 
            'body' => 'required|min:3',
        ];
    }

    /**
     * Persist the content item to the database.
     */
    public function persist(Content $content = null) {
        if (!$content) {
            $content = new Content();
            $content->user_id = auth()->user()->id;
        }
        $content->title = request('title');
        $content->body = request('body');
        $content->save();
    }
}
