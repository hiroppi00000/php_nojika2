<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Big_item_category extends Model
{
    protected $fillable = [
        'id',
        'name',
        'created_at'
    ];
}