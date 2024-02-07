<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Item::latest()->paginate(10);

        return response()->json([
            "status" => true,
            "message" => "Tampil Items dengan pagination (10)",
            "data" => $data,
        ], 200);
    }
}
