<?php
namespace App\Http\Controllers;


use App\Models\Team;
use App\Models\Match1;
use App\Models\Tournament;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Match1::with(['tournament', 'team1', 'team2'])->get();
        return view('matches.index', compact('matches'));
    }

    public function create()
    {
        $tournaments = Tournament::all();
        $teams = Team::all();
        return view('matches.create', compact('tournaments', 'teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tournament_id' => 'required|exists:tournaments,id',
            'team1_id' => 'required|exists:teams,id|different:team2_id',
            'team2_id' => 'required|exists:teams,id',
            'match_date' => 'required|date',
            'location' => 'nullable|string|max:255',
        ]);

        Match1::create($request->all());
        return redirect()->route('matches.index')->with('success', 'Match created successfully.');
    }

    public function edit(Match1 $match)
    {
        $tournaments = Tournament::all();
        $teams = Team::all();
        return view('matches.edit', compact('match', 'tournaments', 'teams'));
    }

    public function update(Request $request, Match1 $match)
    {
        $request->validate([
            'tournament_id' => 'required|exists:tournaments,id',
            'team1_id' => 'required|exists:teams,id|different:team2_id',
            'team2_id' => 'required|exists:teams,id',
            'match_date' => 'required|date',
            'location' => 'nullable|string|max:255',
        ]);

        $match->update($request->all());
        return redirect()->route('matches.index')->with('success', 'Match updated successfully.');
    }

    public function destroy(Match1 $match)
    {
        $match->delete();
        return redirect()->route('matches.index')->with('success', 'Match deleted successfully.');
    }
}
