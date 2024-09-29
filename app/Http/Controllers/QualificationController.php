<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    public function rateUser(Request $request, $id)
    {
        $data = $request->validate(['score' => 'required|numeric']);
//        $qualifier = User::query()->inRandomOrder()->first();
        $qualifier = $request->user();
        $rateable = User::find($id);
        $qualifier->rate($rateable, $data->score);
        return response()->json([
            'data' => "El usuario $qualifier->name calificó al usuario $rateable->name con."
        ]);
    }

    public function rateProduct(Request $request,$id)
    {
        $data = $request->validate(['score' => 'required|numeric']);
        $qualifier = $request->user();
//        $qualifier = User::query()->inRandomOrder()->first();
        $rateable = Product::find($id);
        $qualifier->rate($rateable, $data['score']);
        return response()->json(['data' => "El usuario $qualifier->name calificó el product $rateable->name con"]);
    }
}
