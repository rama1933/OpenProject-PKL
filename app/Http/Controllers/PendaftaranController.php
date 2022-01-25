<?php

namespace App\Http\Controllers;

use App\Jenis;
use App\Merk;
use App\Pendaftaran;
use App\Type;
use PDF;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $data['pendaftaran'] = Pendaftaran::where('user_id',auth()->user()->id)->get();
        return view('pendaftaran.index', $data);
    }

    public function index_tambah()
    {
        $data['jenis'] = Jenis::all();
        $data['type'] = Type::all();
        $data['merk'] = Merk::all();
        return view('pendaftaran.index_tambah',$data);
    }

    public function index_edit(Request $request, $id)
    {
        $data['pendaftaran'] = Pendaftaran::where('id', $id)->get();
        $jenis_id = Pendaftaran::where('id', $id)->pluck('jenis_id');
        $merk_id = Pendaftaran::where('id', $id)->pluck('merk_id');
        $type_id = Pendaftaran::where('id', $id)->pluck('type_id');

         $data['jenis'] = Jenis::where('id','!=', $jenis_id[0])->get();
         $data['jenis2'] = Jenis::where('id', $jenis_id[0])->get();

         $data['merk'] = Merk::where('id','!=', $merk_id[0])->get();
         $data['merk2'] = Merk::where('id', $merk_id[0])->get();

          $data['type'] = Type::where('id','!=', $type_id[0])->get();
         $data['type2'] = Type::where('id', $type_id[0])->get();
        return view('pendaftaran.index_edit', $data);
    }

    public function store(Request $request)
    {
        $will_insert = $request->except([ 'tanggal', '_token']);
        // $tanggal = strtotime($request->input('tanggal'));
        $will_insert['tanggal'] = date('Y-m-d');


        $pendaftaran = Pendaftaran::create($will_insert);

        return redirect('pendaftaran')->with('message', 'Berhasil menyimpan data');
    }

    public function update(Request $request)
    {
        $will_insert = $request->except([ 'tanggal', '_token', '_method']);
        $tanggal = strtotime($request->input('tanggal'));
        $will_insert['tanggal'] = date('Y-m-d', $tanggal);


        $pendaftaran = Pendaftaran::where('id', $request->input('id'))->update($will_insert);
        // return response()->json(true);
        return redirect('pendaftaran')->with('message', 'Berhasil menyimpan data');
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
        $data['pendaftaran'] = Pendaftaran::where('user_id',auth()->user()->id)->get();
        $pdf = PDF::loadview('pendaftaran.indexpdf', $data)->setPaper('a4', 'landscape');
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
        $pdf = PDF::loadview('pendaftaran.indexpdf_detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('Pendaftaran.pdf');
    }
}
