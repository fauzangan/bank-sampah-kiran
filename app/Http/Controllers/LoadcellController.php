<?php

namespace App\Http\Controllers;

use App\Models\Loadcell;
use Illuminate\Http\Request;

class LoadcellController extends Controller
{
    public function readWeight() {
        $data = Loadcell::where('id', 1)->first();

        return response()->json($data);
    }

    public function getLoadcellValue(Request $request) {
        Loadcell::where('id', 1)->update([
            'weight' => $request->weight
        ]);
    }

    public function postData(Request $request) {
        return dd($request);
    }
}
