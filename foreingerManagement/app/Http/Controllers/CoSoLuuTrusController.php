<?php

namespace App\Http\Controllers;

use App\Models\CoSoLuuTru;
use App\Models\NguoiDung;
use App\Models\PhuongXa;
use App\Models\QuanHuyen;
use App\Models\TinhThanh;
use Illuminate\Http\Request;

class CoSoLuuTrusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = CoSoLuuTru::with('nguoiDung');

        if (!empty($search)) {
            $query->where('tenCoSo', 'like', '%' . $search . '%');
        }

        $cosoluutrus = $query->orderBy('created_at', 'asc')->paginate(10)->appends(['search' => $search]);

        return view('cosoluutrus.index', compact('cosoluutrus', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tinhThanhs = TinhThanh::all();
        $quanHuyens = QuanHuyen::all();
        $phuongXas = PhuongXa::all();
        $nguoiDungs = NguoiDung::all();
        return view('cosoluutrus.create', compact('tinhThanhs', 'quanHuyens', 'phuongXas', 'nguoiDungs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $cosoluutru = CoSoLuuTru::create([
            'idNguoiDung' => $request->input('idNguoiDungHidden'),
            'idPhuongXa' => $request->input('phuongXa'),
            'tenCoSo' => $request->input('tenCoSo'),
            'diaChiCoSo' => $request->input('diaChiCoSo'),
            'sdt' => $request->input('sdt'),
            'email' => $request->input('email'),
            'loaiHinh' => $request->input('loaiHinh'),
        ]);

        return redirect()->route('cosoluutrus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tinhThanhs = TinhThanh::all();
        $cosoluutru = CoSoLuuTru::findOrFail($id);
        $quanHuyens = QuanHuyen::where('idTinhThanh', $cosoluutru->phuongXa->quanHuyen->idTinhThanh)->get();
        $phuongXas = PhuongXa::where('idQuanHuyen', $cosoluutru->phuongXa->idQuanHuyen)->get();


        return view('cosoluutrus.edit', compact('cosoluutru', 'tinhThanhs', 'quanHuyens', 'phuongXas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cosoluutru = CoSoLuuTru::where('idCoSo', $id)
            ->update([
                'tenCoSo' => $request->input('tenCoSo'),
                'diaChiCoSo' => $request->input('diaChiCoSo'),
                'idPhuongXa' => $request->input('phuongXa'),
                'sdt' => $request->input('sdt'),
                'email' => $request->input('email'),
                'loaiHinh' => $request->input('loaiHinh'),
            ]);
            return redirect('/cosoluutrus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cosoluutru = CoSoLuuTru::findOrFail($id);
        $cosoluutru->delete();
        return redirect('/cosoluutrus');
    }
}
