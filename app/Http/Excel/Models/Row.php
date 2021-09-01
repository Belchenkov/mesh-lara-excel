<?php

namespace App\Http\Excel\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'date'
    ];
}
