<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $post = Post::find($this->route('post.create'));

        // return $post && $this->user()->can('create', $post);
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
                'post_comment' => 'required|max:255',
                'thread_id' => 'required|',
                'user_id' => 'required|',
            ];
    }
}
