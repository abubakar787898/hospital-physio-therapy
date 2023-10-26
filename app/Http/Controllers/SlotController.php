<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index()
    {
        $slots = Slot::all();

        return view('admin.slot.index',compact('slots'));
        // return response()->json($slots);
    }

    public function create(Request $request)
    {
        $slot = Slot::create([
            'date_time' => $request->input('date_time'),
            'status' => 'available',
        ]);

        return response()->json($slot, 201);
    }

    public function book($id)
    {
        $slot = Slot::findOrFail($id);

        if ($slot->status === 'available') {
            $slot->update(['status' => 'booked']);
            return response()->json(['message' => 'Slot booked successfully']);
        } else {
            return response()->json(['message' => 'Slot not available'], 422);
        }
    }
}
