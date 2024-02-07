<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        // Check rules request input
        $rules = ["description"  => "required|max:255"];
        $validator = Validator::make($request->all(), $rules);

        // Check condition if failed
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "Gagal memasukan data",
                'data' => $validator->errors(),
            ], 406)->throwResponse(406, "Bad Request");
        } else {

            // if not failed
            $data = new Unit();
            $data->description = $request->input("description");
            $data = Unit::create($data->toArray());

            return response()->json([
                'status' => true,
                'message' => "Berhasil menyimpan data",
                'data' => $data
            ]);
        }
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
    public function update(Request $request, string $id)
    {
        $findId = Unit::find($id);
        if ($findId == null) {
            return response()->json([
                "status" => false,
                "message" => "Data Unit tidak ditemukan",
            ], 404);
        } else {
            $rules = ["description"  => "required|max:255"];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => "Gagal melakukan update data",
                    'data' => $validator->errors(),
                ], 406)->throwResponse(406, "Bad Request");
            } else {

                $unit = [
                    'description' => $request->get("description")
                ];
                $data = Unit::where('id', $id)->update($unit);
                return response()->json([
                    'status' => true,
                    'message' => "Berhasil melakukan update data",
                    'data' => $data
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $findId = Unit::find($id);
        if ($findId == null) {
            return response()->json([
                "status" => false,
                "message" => "Data Unit tidak ditemukan",
            ], 404);
        } else {
            $data = $findId->delete();
            return response()->json([
                'status' => true,
                'message' => "Berhasil melakukan hapus data",
                'data' => $data
            ]);
        }
    }
}
