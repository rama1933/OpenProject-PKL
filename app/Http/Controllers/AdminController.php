<?php

namespace App\Http\Controllers;

use App\Jenis;
use App\Pendaftaran;
use App\Trx_pendaftaran;
use PDF;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data['pendaftaran'] = Pendaftaran::all();
        return view('admin.index', $data);
    }

    public function index_tambah()
    {
        $data['jenis'] = Jenis::all();
        return view('admin.index_tambah',$data);
    }

    public function index_edit(Request $request, $id)
    {
        // $data['pendaftaran'] = Pendaftaran::where('id', $id)->get();
        // $jenis_id = Pendaftaran::where('id', $id)->pluck('jenis_id');

        //  $data['jenis'] = Jenis::where('id','!=', $jenis_id[0])->get();
        //  $data['jenis2'] = Jenis::where('id', $jenis_id[0])->get();
        $data['id'] = $id;
        $data['pendaftaran'] = Trx_pendaftaran::where('pendaftaran_id', $id)->get();
        return view('admin.index_edit', $data);
    }

    public function store(Request $request)
    {
        $will_insert = $request->except([ 'tgl_stnk','tgl_pajak','_token', '_method']);
        $tgl_pajak = strtotime($request->input('tgl_pajak'));
        $will_insert['tgl_pajak'] = date('Y-m-d', $tgl_pajak);
        $tgl_stnk = strtotime($request->input('tgl_stnk'));
        $will_insert['tgl_stnk'] = date('Y-m-d', $tgl_stnk);


         $pendaftaran = Trx_pendaftaran::create($will_insert);
        // return response()->json(true);
        return redirect('pendaftaran_admin')->with('message', 'Berhasil menyimpan data');
    }

    public function update(Request $request)
    {
        $will_insert = $request->except([ 'tgl_stnk','tgl_pajak','_token', '_method']);
        $tgl_pajak = strtotime($request->input('tgl_pajak'));
        $will_insert['tgl_pajak'] = date('Y-m-d', $tgl_pajak);
        $tgl_stnk = strtotime($request->input('tgl_stnk'));
        $will_insert['tgl_stnk'] = date('Y-m-d', $tgl_stnk);



        $pendaftaran = Trx_pendaftaran::where('pendaftaran_id', $request->input('pendaftaran_id'))->update($will_insert);
        // return response()->json(true);
        return redirect('pendaftaran_admin')->with('message', 'Berhasil menyimpan data');
    }

    public function hapus(Request $request, $id)
    {

        // hapus data
        Pendaftaran::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Berhasil menghapus data');
    }

    public function pdf(Request $request)
    {

        // $query = Pendaftaran::select(['tbl_master_pendaftaran.*']);

        // if ($request->input('jenis') != null) {
        //     $query->where('tbl_master_pendaftaran.jenis', $request->input('nik'));
        // }
        // if ($request->input('tanggal') != null) {
        //     $query->where('tbl_master_pendaftaran.tanggal', $request->input('tanggal'));
        // }
        // // if ($request->input('tahun') != null) {
        // //     $query->whereYear('tbl_master_pendaftaran.tanggal', $request->input('tahun'));
        // // }
        // if ($request->input('nopol') != null) {
        //     $query->where('tbl_master_pendaftaran.nopol', $request->input('nopol'));
        // }

        // $data['data'] = $query->get();
        $data['pendaftaran'] = Pendaftaran::all();
        $pdf = PDF::loadview('admin.indexpdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('Pendaftaran.pdf');
    }



    public function pdf_detail(Request $request,$id)
    {

        // $query = Pendaftaran::select(['tbl_master_pendaftaran.*']);

        // if ($request->input('jenis') != null) {
        //     $query->where('tbl_master_pendaftaran.jenis', $request->input('nik'));
        // }
        // if ($request->input('tanggal') != null) {
        //     $query->where('tbl_master_pendaftaran.tanggal', $request->input('tanggal'));
        // }
        // // if ($request->input('tahun') != null) {
        // //     $query->whereYear('tbl_master_pendaftaran.tanggal', $request->input('tahun'));
        // // }
        // if ($request->input('nopol') != null) {
        //     $query->where('tbl_master_pendaftaran.nopol', $request->input('nopol'));
        // }

        // $data['data'] = $query->get();
        $data['pendaftaran'] = Pendaftaran::where('id',$id)->get();
        $pdf = PDF::loadview('admin.indexpdf_detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('Pendaftaran.pdf');
    }
}
