<?php

namespace App\Http\Controllers;

use App\Models\TimelineMilestone;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(TimelineMilestone::orderBy('year')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $validated = $request->validate([
            'year' => 'required|string|max:255',
            'phase_ml' => 'required|string|max:255',
            'phase_en' => 'required|string|max:255',
            'desc_ml' => 'required|string',
            'desc_en' => 'required|string',
        ]);

        $milestone = TimelineMilestone::create($validated);

        return response()->json($milestone, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $milestone = TimelineMilestone::findOrFail($id);

        $validated = $request->validate([
            'year' => 'sometimes|required|string|max:255',
            'phase_ml' => 'sometimes|required|string|max:255',
            'phase_en' => 'sometimes|required|string|max:255',
            'desc_ml' => 'sometimes|required|string',
            'desc_en' => 'sometimes|required|string',
        ]);

        $milestone->update($validated);

        return response()->json($milestone);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $milestone = TimelineMilestone::findOrFail($id);
        $milestone->delete();

        return response()->json(['message' => 'Timeline milestone deleted successfully']);
    }
}
