<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NguoiDung;


class NguoiDungController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->get('term');  // Lấy từ khóa tìm kiếm

        $nguoiDungs = NguoiDung::where('hoVaTen', 'LIKE', '%' . $searchTerm . '%')
            ->limit(10)
            ->get();

        return response()->json([
            'results' => $nguoiDungs->map(function ($nguoiDung) {
                return [
                    'id' => $nguoiDung->idNguoiDung,
                    'text' => $nguoiDung->hoVaTen
                ];
            })
        ]);
    }
}
