<?php

namespace App\Http\Controllers;
use App\Models\TinhThanh;
use App\Models\QuanHuyen;
use App\Models\PhuongXa;


use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function getQuanHuyen($idTinhThanh)
    {
        $quanhuyens = QuanHuyen::where('idTinhThanh', $idTinhThanh)->get();
        return response()->json(['quanhuyens' => $quanhuyens]);
    }

    public function getPhuongXa($idQuanHuyen)
    {
        $phuongxas = PhuongXa::where('idQuanHuyen', $idQuanHuyen)->get();
        return response()->json(['phuongxas' => $phuongxas]);
    }

}
