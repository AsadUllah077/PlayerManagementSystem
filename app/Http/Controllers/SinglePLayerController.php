<?php

namespace App\Http\Controllers;

use App\Models\SinglePLayer;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Validator;

class SinglePLayerController extends Controller
{
    public function index(): View
    {
        return view('admin/singlePlayer');
    }

    public function list(): View
    {
        $singleplayers = SinglePLayer::all();
        return view('admin/singlePlayerList', compact('singleplayers'));
    }

    public function edit($id): View
    {
        $singlePlayer = SinglePLayer::findOrFail($id);
        return view('admin.singlePlayerEdit', compact('singlePlayer'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'ranking' => 'required|integer|min:1',
            'ip_points' => 'required|integer|min:0',
            'phone' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        SinglePLayer::create([
            'name' => $request->name,
            'password' => bcrypt($request->input('password')),
            'ranking' => $request->ranking,
            'ip_points' => $request->ip_points,
            'phone' => $request->phone
        ]);

        return redirect()->route('admin.singleplayer.list');
    }

    public function update(Request $request, $id)
    {
        // Find the existing record by ID
        $singlePlayer = SinglePLayer::findOrFail($id);

        // Create a validator instance with the request data and validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
            'ranking' => 'required|integer|min:1',
            'ip_points' => 'required|integer|min:0',
            'phone' => 'required|string|max:15',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update the existing record with the validated data
        $singlePlayer->update([
            'name' => $request->input('name'),
            'password' => $request->filled('password') ? bcrypt($request->input('password')) : $singlePlayer->password,
            'ranking' => $request->input('ranking'),
            'ip_points' => $request->input('ip_points'),
            'phone' => $request->input('phone'),
        ]);

        // Redirect to the list page or another page as needed
        return redirect()->route('admin.singleplayer.list')->with('success', 'Player updated successfully');
    }
    public function delete($id)
    {
        SinglePLayer::destroy($id);
        return redirect()->route('admin.singleplayer.list');
    }

    public function signUpView(){
        $players = SinglePLayer::all();
        return view('admin.signUp', compact('players', 'players'));
    }
}
