<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'substance_id',
        'manufacturer_id',
        'price',
    ];
}
