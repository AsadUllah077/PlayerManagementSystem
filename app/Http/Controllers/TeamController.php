<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\SinglePlayer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index', compact('teams'));
    }

    // Show form to create a new team
    public function create()
    {
        return view('admin.teams.create');
    }

    // Store a new team in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Team::create($request->all());

        return redirect()->route('admin.teams.index')->with('success', 'Team created successfully!');
    }

    // Show form to edit an existing team
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.edit', compact('team'));
    }

    // Update an existing team in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $team = Team::findOrFail($id);
        $team->update($request->all());

        return redirect()->route('admin.teams.index')->with('success', 'Team updated successfully!');
    }

    // Delete a team from the database
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('admin.teams.index')->with('success', 'Team deleted successfully!');
    }

    public function addPlayers($id)
    {
        $team = Team::findOrFail($id);
        $players = SinglePlayer::all(); // Get all players
        return view('admin.teams.add-players', compact('team', 'players'));
    }

    // Store players added to the team
    public function storePlayers(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        // Validate the request
        $request->validate([
            'players' => 'required|array',
            'players.*' => 'exists:single_p_layers,id',
        ]);

        // Attach new players to the team without removing existing ones
        $team->players()->attach($request->input('players'));

        return redirect()->route('admin.teams.index')->with('success', 'Players added to the team successfully!');
    }

    public function index1()
    {
        // Fetch all teams with their associated players
        $teams = Team::with('players')->get();

        return view('admin.teams.index1', compact('teams'));
    }
}
