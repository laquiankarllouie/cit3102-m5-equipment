<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Equipment::query();
        foreach (['name', 'category', 'condition', 'quantity', 'location'] as $field) {
            if ($request->query($field)) {
                $query->where($field, $request->query($field));
            }
        }
        return $query->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'condition' => 'required|string|max:100',
            'quantity' => 'required|integer|min:0',
            'location' => 'required|string|max:100',
        ]);
        return response()->json(Equipment::create($data), 201);
    }

    public function show(Equipment $equipment)
    {
        return $equipment;
    }

    public function update(Request $request, Equipment $equipment)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:100',
            'condition' => 'sometimes|string|max:100',
            'quantity' => 'sometimes|integer|min:0',
            'location' => 'sometimes|string|max:100',
        ]);
        $equipment->update($data);
        return $equipment;
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return response()->noContent();
    }
}