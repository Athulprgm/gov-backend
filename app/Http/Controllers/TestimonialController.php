<?php

namespace App\Http\Controllers;

use App\Models\CitizenTestimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(CitizenTestimonial::all());
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
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'quote_ml' => 'required|string',
            'quote_en' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'avatar' => 'nullable|string',
        ]);

        $testimonial = CitizenTestimonial::create($validated);

        return response()->json($testimonial, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $testimonial = CitizenTestimonial::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'role' => 'sometimes|required|string|max:255',
            'quote_ml' => 'sometimes|required|string',
            'quote_en' => 'sometimes|required|string',
            'rating' => 'sometimes|required|integer|between:1,5',
            'avatar' => 'sometimes|nullable|string',
        ]);

        $testimonial->update($validated);

        return response()->json($testimonial);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $testimonial = CitizenTestimonial::findOrFail($id);
        $testimonial->delete();

        return response()->json(['message' => 'Testimonial deleted successfully']);
    }
}
