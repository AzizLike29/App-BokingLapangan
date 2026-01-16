<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    public function index(Request $request)
    {
        $query = Court::query();

        // Search query court
        if ($request->has('city')) {
            $query->where('city', 'LIKE', '%' . $request->city . '%');
        }
        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        return response()->json([
            'data' => $query->get(),
        ]);
    }
}
