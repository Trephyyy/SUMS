<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Unit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $fillable = [
        'id',
        'name',
        'quantity',
        'SKU',
        'price',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
    ];
}
