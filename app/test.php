<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class test extends Model
{

    protected $table = 'test';
    protected $fillable = ['title', 'time', 'text', 'catalog_id'];
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function scopeteemo($query)
    {
        return $query->orderBy('id', 'desc')->paginate(5);
    }

    public function apply(Builder $builder, Model $model)
    {
        return $builder->where('age', '>', 200);
    }
}
