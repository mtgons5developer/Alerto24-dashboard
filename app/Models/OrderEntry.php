<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderEntry extends Model
{
    use HasFactory;
    protected $fillable = [
      'status'
    ];
    protected $table = "order_entry";
    public $timestamps = false;
}
