<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $fillable = [
        'id',
        'middle_category_id',
        'location',
        'name',
        'price',
        'note',
        'item_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}