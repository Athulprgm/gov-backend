<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(District::orderBy('name_en')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Simple auth check just in case middleware is missed
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $validated = $request->validate([
            'id' => 'sometimes|string|unique:districts,id',
            'name_en' => 'required|string|max:255',
            'name_ml' => 'required|string|max:255',
            'investment' => 'required|string|max:255',
            'projects_count' => 'required|integer|min:0',
            'highlight_ml' => 'required|string',
            'highlight_en' => 'required|string',
            'x' => 'required|integer',
            'y' => 'required|integer',
        ]);

        if (empty($validated['id'])) {
            $validated['id'] = Str::slug($validated['name_en']);
        }

        $district = District::create($validated);

        return response()->json($district, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $district = District::findOrFail($id);

        $validated = $request->validate([
            'name_en' => 'sometimes|required|string|max:255',
            'name_ml' => 'sometimes|required|string|max:255',
            'investment' => 'sometimes|required|string|max:255',
            'projects_count' => 'sometimes|required|integer|min:0',
            'highlight_ml' => 'sometimes|required|string',
            'highlight_en' => 'sometimes|required|string',
            'x' => 'sometimes|required|integer',
            'y' => 'sometimes|required|integer',
        ]);

        $district->update($validated);

        return response()->json($district);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $district = District::findOrFail($id);
        $district->delete();

        return response()->json(['message' => 'District deleted successfully']);
    }
}
