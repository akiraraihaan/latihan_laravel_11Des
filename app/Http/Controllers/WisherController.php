<?php

namespace App\Http\Controllers;

use App\Models\Wisher;
use Illuminate\Http\Request;

class WisherController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'beans' => 'required',
        ]);

        $wisher = Wisher::create([
            'name' => $validated['name'],
            'beans' => $validated['beans'],
        ]);

        return response()->json($wisher);
    }

    public function destroy($id)
{
    $wisher = Wisher::findOrFail($id);
    $wisher->delete();

    return response()->json(null, 204); // 204 No Content
}
}
