<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Translatable;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * The attributes that are translatable
     *
     * @var array
     */
    protected $translatedAttributes = ['name'];

    public function scopeActive($query)
    {
        return $query ->where('is_active',1);
    }
    /**
     * The attributes that will be sluged
     *
     * @var array
     */
    protected $slugAttributes = ['name'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['is_active','photo'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function getActive()
    {
        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }

    public function getPhotoAttribute($val)
    {
        return ($val !==null) ? asset('assets/images/brands/'.$val) : "";
    }
}
