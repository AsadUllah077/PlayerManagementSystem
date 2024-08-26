<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinglePLayer extends Model
{
    use HasFactory;
    public function teams()
{
    return $this->belongsToMany(Team::class, 'team_p_layers', 'single_p_layer_id', 'team_id');
}

    protected $fillable = ['name', 'password', 'ranking', 'ip_points', 'phone'];
    protected $table = 'single_p_layers';
}
