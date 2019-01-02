<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Middle_item_category extends Model
{
    protected $fillable = [
        'id',
        'big_cateogory_id',
        'name',
        'created_at'
    ];
}