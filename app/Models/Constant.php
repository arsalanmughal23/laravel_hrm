<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constant extends Model
{
    use HasFactory;

    protected $fillable = [
        'group',
        'key',
        'slug',
        'text',
        'value',
        'active',
    ];

    public function scopeFor(Builder $query, string $group)
    {
        return $query->where('group', $group);
    }
    public function scopeKey(Builder $query, string $key)
    {
        return $query->where('key', $key);
    }
    public function scopeText(Builder $query, string $text)
    {
        return $query->where('text', $text);
    }

}
