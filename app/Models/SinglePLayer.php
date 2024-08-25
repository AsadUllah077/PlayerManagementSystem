<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinglePLayer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'password', 'ranking', 'ip_points', 'phone'];
    protected $table = 'single_p_layers';
}
