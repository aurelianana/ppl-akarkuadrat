<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkarKuadrat extends Model
{
    use HasFactory;

    protected $fillable = [
        'angka',
        'hasil',
        'method',
        'execution_time'
    ];
}
