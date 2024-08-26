<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    // Define the relationship with SinglePlayer if needed
    public function players()
{
    return $this->belongsToMany(SinglePlayer::class, 'team_p_layers', 'team_id', 'single_p_layer_id');
}
}
