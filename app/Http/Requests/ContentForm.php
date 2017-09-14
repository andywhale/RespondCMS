<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Content;
use App\ContentBlock;

class ContentForm extends FormRequest
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
        $content->title = $this->title;
        $content->body = $this->body;
        $content->save();
        foreach ($this->block as $block) {
            if (isset($block['id'])) {
                $contentBlock = ContentBlock::find($block['id']);
                $contentBlock->fill($block)->save();
            } else {
                $content->publishContentBlock(new ContentBlock($block));
            }
        }
        $content->tags()->sync($this->tags);
    }
}
