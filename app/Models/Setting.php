<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable=[
        'qty',
        'deltatime',
        'timeframe',
        'toggle',
        'Error',
        'pair'
    ];
    public $timestamps = false;
}
