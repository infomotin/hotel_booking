<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminTeams()
    {
        $teams = Team::all();
        return view('backend.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function adminTeamsCreate()
    {
        return view('backend.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function adminTeamsStore(Request $request)
    {
            // $table->string('name');
            // $table->string('position');
            // $table->string('image')->nullable();
            // //social media links
            // $table->string('facebook')->nullable();
            // $table->string('twitter')->nullable();
            // $table->string('linkedin')->nullable();
            // //about
            // $table->text('about')->nullable();
            // //description
            // $table->text('description')->nullable(); 

        // if require has image file
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/teams/', $filename);
            $imageName = $filename;
        }
        //now store
        Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'image' => $imageName ?? null,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'about' => $request->about,
            'description' => $request->description,
        ]);
        //notification
        $notification = array(
            'message' => 'Team member created successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.teams.index')->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function adminTeamsEdit(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        return view('backend.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function adminTeamsUpdate(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        // If a new image is uploaded, handle the upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/teams/', $filename);
            $team->image = $filename;
        }

        // Update the team member
        $team->name = $request->name;
        $team->position = $request->position;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->linkedin = $request->linkedin;
        $team->about = $request->about;
        $team->description = $request->description;
        $team->save();

        // Notification
        $notification = array(
            'message' => 'Team member updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.teams.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function adminTeamsDelete($id)
    {
        // remove iamge 
        
        $team = Team::findOrFail($id);
        if ($team->image) {
            unlink(public_path('upload/teams/' . $team->image));
        }
        $team->delete();

        // Notification
        $notification = array(
            'message' => 'Team member deleted successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.teams.index')->with($notification);
    }
}
