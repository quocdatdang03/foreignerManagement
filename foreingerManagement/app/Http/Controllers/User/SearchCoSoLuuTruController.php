<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CoSoLuuTru;
use Illuminate\Http\Request;


class SearchCoSoLuuTruController extends Controller
{
    /**
     * Display the search form.
     */
    public function index()
    {
        return view('user.search');
    }

    /**
     * Handle the search request.
     */
    public function search(Request $request)
    {
        $request->validate([
            'keyword' => 'nullable|string|max:255',
        ]);

        $keyword = $request->keyword;

        // Thực hiện tìm kiếm
        $results = CoSoLuuTru::query()
            ->where('tenCoSo', 'LIKE', "%{$keyword}%")
            ->orWhere('diaChiCoSo', 'LIKE', "%{$keyword}%")
            ->orWhere('loaiHinh', 'LIKE', "%{$keyword}%")
            ->get();

        // Chuyển kết quả tới view
        return view('user.search-results', compact('results', 'keyword'));
    }
}
