<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Match1 extends Model
{
    use HasFactory;
   protected $table = "matches";
    protected $fillable = ['tournament_id', 'team1_id', 'team2_id', 'match_date', 'location'];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
}
