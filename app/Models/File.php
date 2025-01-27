<?php

namespace App\Models;

use App\Traits\HasCreatorAndUpdater;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Support\Facades\Auth;

class File extends Model
{
    use HasFactory, HasCreatorAndUpdater, NodeTrait, SoftDeletes;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(File::class, 'parent_id', 'id');
    }

    public function isRoot(): bool
    {
        return $this->parent_id === null;
    }

    public function isOwnedBy($userId){
        return $this->created_by == $userId;
    }

    public function Owner(): Attribute
    {
        return Attribute::make(
            function (mixed $value, array $attributes) {
                get: return $attributes['created_by'] === Auth::id()
                    ? 'me'
                    : $this->user->name;
            }
        );
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->parent_id) { return;}

            $model->path = (!$model->parent->isRoot() ? $model->parent->path .'/' : '') . Str::slug($model->name);

        });
    }

    public static function getRoot()
    {
        return File::query()->whereIsRoot()->where('created_by', Auth::id())->firstOrFail();
    }
}
