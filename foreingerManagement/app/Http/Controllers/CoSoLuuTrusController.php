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

        $cosoluutrus = $query->paginate(10)->appends(['search' => $search]);

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

        $loaiHinhs = CoSoLuuTru::distinct()->pluck('loaiHinh', 'loaiHinh')->toArray();

        return view('cosoluutrus.create', compact('tinhThanhs', 'quanHuyens', 'phuongXas', 'nguoiDungs', 'loaiHinhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        if ($request->has('createNewUser') && $request->input('createNewUser') == 'on') {
            $request->validate([
                'hoVaTen' => 'required|string|max:255',
                'emailND' => 'required|email|unique:nguoi_dungs,email',
                'sdtND' => 'required|digits:10|unique:nguoi_dungs,sdt',
                'matKhau' => 'required|string|min:6',
                'soCCCD' => 'required|string|max:14|unique:nguoi_dungs,soCCCD',
            ]);

            $nguoiDungMoi = NguoiDung::create([
                'hoVaTen' => $request->input('hoVaTen'),
                'email' => $request->input('emailND'),
                'sdt' => $request->input('sdtND'),
                'matKhau' => bcrypt($request->input('matKhau')),
                'soCCCD' => $request->input('soCCCD'),
                'trangThai' => 'active',
                'idVaiTro' => 1,
                'created_at' =>now(),
                'updated_at' => now(),
            ]);

            $idNguoiDung = $nguoiDungMoi->idNguoiDung;

        } else {
            $idNguoiDung = $request->input('idNguoiDungHidden');
        }

        $request->validate([
            // 'idNguoiDung' =>'required',
            'phuongXa' => 'required',
            'tenCoSo' => 'required|string|max:255',
            'diaChiCoSo' => 'required|string|max:255',
            'sdt' => 'required|digits:10|unique:co_so_luu_trus,sdt',
            'email' => 'required|email|unique:co_so_luu_trus,email',
            'loaiHinh' => 'required|string|max:255',
        ]);

        $cosoluutru = CoSoLuuTru::create([
            'idNguoiDung' => $idNguoiDung,
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
        $loaiHinhs = CoSoLuuTru::distinct()->pluck('loaiHinh', 'loaiHinh')->toArray();


        return view('cosoluutrus.edit', compact('cosoluutru', 'tinhThanhs', 'quanHuyens', 'phuongXas','loaiHinhs'));
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
        $request->validate([
            'phuongXa' => 'required',
            'tenCoSo' => 'required|string|max:255',
            'diaChiCoSo' => 'required|string|max:255',
            'sdt' => 'required|digits:10',
            'email' => 'required|email',
            'loaiHinh' => 'required|string|max:255',
        ]);

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
