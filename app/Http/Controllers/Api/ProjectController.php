<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Potresti fare un paginate() se vuoi la paginazione
        $projects = Project::all();

        // Restituisci un JSON
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($id)
    {
        $project = Project::find($id);

        if(!$project) {
            return response()->json([
                'success' => false,
                'error' => 'Project not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'result' => $project
        ]);
    }
}