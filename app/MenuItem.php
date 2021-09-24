<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'title', 'slug', 'order', 'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('order', 'asc');
    }

    // recursive, loads all descendants
    public function childrens()
    {
        return $this->children()->with('childrens');
    }
}
