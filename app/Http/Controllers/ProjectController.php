<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    // create
    public function create(Request $request)
    {
        $data = $request->validate([
            'contractor_name' => 'required|string|max:30',
            'contractor_number' => 'required|string|max:13',
            'contractor_email' => 'required|email|max:50',
            'contractor_image' => 'required|string|max:500',
            'building_image' => 'required|string|max:500',
            'spent_amount' => 'required|string|max:30',
            'location' => 'required|string|max:100',
        ]);
        
        $details = Project::create($data);

        return response()->json($details, 201);
    }

    // read all
    public function read()
    {
        return response()->json(Project::all(), 200);
    }

    // read by id
    public function readById($id)
    {
        try {
            $project = Project::findOrFail($id);
            return response()->json($project, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    // update
    public function update(Request $request, $id)
    {
        $data = Project::findOrFail($id);
        $details = $request->validate([
            'contractor_name' => 'required|string|max:30',
            'contractor_number' => 'required|string|max:13',
            'contractor_email' => 'required|email|max:50',
            'contractor_image' => 'required|string|max:500',
            'building_image' => 'required|string|max:500',
            'spent_amount' => 'required|string|max:30',
            'location' => 'required|string|max:100',
        ]);

        $data->update($details);
        return response()->json($data, 200);
    }

    // delete
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(['message' => 'Project deleted successfully'], 200);
    }
}
