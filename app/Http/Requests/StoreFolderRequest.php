<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class StoreFolderRequest extends ParentIdBaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $parent = $this->parent;

        if (!$parent)
        {
            $parent = File::getRoot();
        }

        return array_merge(parent::rules(), [
            'name' => [
                'required',
                Rule::unique(File::class, 'name')
                    ->where('parent_id', $parent->id)
                    ->where('created_by', Auth::id())
                    ->where('parent_id', $parent)
                    ->whereNull('deleted_at')
            ]
        ]);
    }

    public function messages()
    {
        return [
            'name.unique' => 'Folder ":input" already exists.'
        ];
    }
}
