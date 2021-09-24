<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'name_slug', 'posturl_slug', 'disabled', 'icon', 'menu_icon_show', 'description', 'type'];

    public function post()
    {
        return $this->hasMany('App\Post', 'category_id');
    }

    public function mailcontact()
    {
        return $this->hasMany('App\Contacts', 'category_id');
    }

    public function maillabel()
    {
        return $this->hasMany('App\Contacts', 'label_id');
    }

    public function scopeByType($query, $type)
    {
        return $query->where("type", $type);
    }

    public function scopeByMain($query)
    {
        return $query->where("main", "1");
    }

    public function scopeBySub($query)
    {
        return $query->where("main", "2");
    }

    public function scopeByActive($query)
    {
        return $query->where("disabled", "0");
    }

    public function scopeByOrder($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function scopeByMenu($query)
    {
        return $query->byMain()->whereNotNull("order")->orderBy('order', 'ASC');
    }

    /**
     * Force a hard delete user.
     *
     * @return bool|null
     */
    public function delete()
    {
        //remove sub categories
        $this->byType($this->id)->delete();

        //remove category
        parent::delete();
    }
}
