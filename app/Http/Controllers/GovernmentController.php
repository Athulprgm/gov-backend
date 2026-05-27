<?php

namespace App\Http\Controllers;

use App\Models\KeralaStateInfo;
use App\Models\ChiefMinister;
use Illuminate\Http\Request;

class GovernmentController extends Controller
{
    /**
     * Get Kerala State Profile and Chief Ministers history.
     */
    public function index()
    {
        $stateInfo = KeralaStateInfo::first();
        if (!$stateInfo) {
            // Seed a default row if somehow empty
            $stateInfo = KeralaStateInfo::create([
                'state_name' => 'Kerala',
                'formed_on' => '1956-11-01',
                'capital' => 'Thiruvananthapuram',
                'official_language' => 'Malayalam',
                'legislature' => 'Kerala Legislative Assembly',
                'high_court' => 'Kerala High Court',
                'current_governor' => 'Rajendra Arlekar',
                'first_cm' => 'E. M. S. Namboodiripad',
                'first_communist_cm_in_india' => 'E. M. S. Namboodiripad',
                'only_muslim_cm' => 'C. H. Mohammed Koya',
                'longest_serving_leaders' => ['K. Karunakaran', 'Pinarayi Vijayan'],
                'current_cm_name' => 'V. D. Satheesan',
                'current_cm_party' => 'Indian National Congress',
                'current_cm_alliance' => 'UDF',
                'current_cm_sworn_in' => '2026-05-18',
                'current_cm_status' => 'Current Chief Minister',
            ]);
        }

        $chiefMinisters = ChiefMinister::orderBy('no')->get();

        return response()->json([
            'state_info' => $stateInfo,
            'chief_ministers' => $chiefMinisters
        ]);
    }

    /**
     * Update State profile information (Admin only).
     */
    public function updateStateInfo(Request $request)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $validated = $request->validate([
            'state_name' => 'sometimes|required|string|max:255',
            'formed_on' => 'sometimes|required|string|max:255',
            'capital' => 'sometimes|required|string|max:255',
            'official_language' => 'sometimes|required|string|max:255',
            'legislature' => 'sometimes|required|string|max:255',
            'high_court' => 'sometimes|required|string|max:255',
            'current_governor' => 'sometimes|required|string|max:255',
            'first_cm' => 'sometimes|required|string|max:255',
            'first_communist_cm_in_india' => 'sometimes|required|string|max:255',
            'only_muslim_cm' => 'sometimes|required|string|max:255',
            'longest_serving_leaders' => 'sometimes|required|array',
            'current_cm_name' => 'sometimes|required|string|max:255',
            'current_cm_party' => 'sometimes|required|string|max:255',
            'current_cm_alliance' => 'sometimes|required|string|max:255',
            'current_cm_sworn_in' => 'sometimes|required|string|max:255',
            'current_cm_status' => 'sometimes|required|string|max:255',
        ]);

        $stateInfo = KeralaStateInfo::first();
        if (!$stateInfo) {
            $stateInfo = KeralaStateInfo::create($validated);
        } else {
            $stateInfo->update($validated);
        }

        return response()->json($stateInfo);
    }

    /**
     * Store new Chief Minister entry (Admin only).
     */
    public function storeCM(Request $request)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $validated = $request->validate([
            'no' => 'required|integer',
            'name' => 'required|string|max:255',
            'party' => 'required|string|max:255',
            'tenure' => 'required|string|max:255',
        ]);

        $cm = ChiefMinister::create($validated);

        return response()->json($cm, 201);
    }

    /**
     * Update Chief Minister entry (Admin only).
     */
    public function updateCM(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $cm = ChiefMinister::findOrFail($id);

        $validated = $request->validate([
            'no' => 'sometimes|required|integer',
            'name' => 'sometimes|required|string|max:255',
            'party' => 'sometimes|required|string|max:255',
            'tenure' => 'sometimes|required|string|max:255',
        ]);

        $cm->update($validated);

        return response()->json($cm);
    }

    /**
     * Delete Chief Minister entry (Admin only).
     */
    public function destroyCM(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $cm = ChiefMinister::findOrFail($id);
        $cm->delete();

        return response()->json(['message' => 'Chief Minister record deleted successfully']);
    }
}
