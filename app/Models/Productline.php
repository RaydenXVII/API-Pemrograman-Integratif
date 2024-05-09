<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productline extends Model
{
    use HasFactory;
    protected $primaryKey = 'productLine';

    protected $fillable = [
        'productLine',
        'textDescription',
        'htmlDescription',
        'image'
    ];
}
