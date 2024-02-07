<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Unit::all();

        return response()->json([
            "status" => true,
            "message" => "GET data Units with list",
            "data" => $data,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Unit::find($id);

        if ($data == null) {
            return response()->json([
                "errors" => "Data unit tidak ditemukan"
            ], 404);
        } else {
            return response()->json([
                "status" => true,
                "message" => "GET detail data Unit dengan ID",
                "data" => $data,
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
