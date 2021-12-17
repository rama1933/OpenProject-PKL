<?php

namespace App\Http\Controllers;

use App\Jenis;
use App\Pendaftaran;
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
        return view('pendaftaran.index_tambah',$data);
    }

    public function index_edit(Request $request, $id)
    {
        $data['pendaftaran'] = Pendaftaran::where('id', $id)->get();
         $data['jenis'] = Jenis::all();
         $data['jenis2'] = Jenis::where('id', $id)->get();
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

        $query = Pendaftaran::select(['tbl_master_pendaftaran.*']);

        if ($request->input('jenis') != null) {
            $query->where('tbl_master_pendaftaran.jenis', $request->input('nik'));
        }
        if ($request->input('tanggal') != null) {
            $query->where('tbl_master_pendaftaran.tanggal', $request->input('tanggal'));
        }
        // if ($request->input('tahun') != null) {
        //     $query->whereYear('tbl_master_pendaftaran.tanggal', $request->input('tahun'));
        // }
        if ($request->input('nopol') != null) {
            $query->where('tbl_master_pendaftaran.nopol', $request->input('nopol'));
        }

        $data['data'] = $query->get();
        $pdf = PDF::loadview('pendaftaran.indexpdf', $data)->setPaper('a4', 'landscape');
        return $pdf->download('Pendaftaran.pdf');
    }
}
