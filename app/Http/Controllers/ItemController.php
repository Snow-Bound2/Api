<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        $item = Item::create($request->all());
        return response()->json([
            'message' => 'Item created successfully',
            'data' => $item
        ], 201);

    }

    public function show(Item $item)
    {
        return $item;
    }

    public function update(Request $request, Item $item)
    {
        $item->update($request->all());
        return response()->json([
            'message' => 'Item updated successfully',
            'data' => $item
        ], 200);
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return response()->json([
            'message' => 'Item deleted successfully'
        ], 204);
    }
}

