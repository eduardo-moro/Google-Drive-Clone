<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\File;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;

class ParentIdBaseRequest extends FormRequest
{
    public ?File $parent = null;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $this->parent = File::query()->where('id', $this->input('parent_id'))->first();

        if ($this->parent && !$this->parent->isOwnedBy(Auth::id()))
        {
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'parent_id' => [
                Rule::exists(File::class, 'id')->where(function(Builder $query) {
                    return $query
                        ->where('is_folder', '=', '1')
                        ->where('created_by', '=', Auth::id());
                })
            ]
        ];
    }
}
