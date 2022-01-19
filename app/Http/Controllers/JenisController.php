<?php

namespace App\Http\Controllers;

use App\Jenis;
use PDF;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
       $data['jenis'] = Jenis::all();
        return view('jenis.index', $data);
    }

    public function index_tambah()
    {
        return view('jenis.index_tambah');
    }

    public function index_edit(Request $request, $id)
    {
        $data['jenis'] = Jenis::where('id', $id)->get();

        return view('jenis.index_edit', $data);
    }

    public function store(Request $request)
    {
        $will_insert = $request->except([ '', '_token']);



        $jenis = Jenis::create($will_insert);

        return redirect('jenis')->with('message', 'Berhasil menyimpan data');
    }

    public function update(Request $request)
    {
        $will_insert = $request->except([ '_token', '_method']);

        $jenis = Jenis::where('id', $request->input('id'))->update($will_insert);
        // return response()->json(true);
        return redirect('jenis')->with('message', 'Berhasil menyimpan data');
    }

    public function hapus(Request $request, $id)
    {

        // hapus data
        Jenis::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Berhasil menghapus data');
    }

    public function pdf(Request $request)
    {
        $data['jenis'] = Jenis::get();
        $pdf = PDF::loadview('jenis.indexpdf', $data)->setPaper('a4', 'landscape');
        return $pdf->download('jenis.pdf');
    }



    public function pdf_detail(Request $request,$id)
    {

        $data['jenis'] = Jenis::where('id',$id)->get();
        $pdf = PDF::loadview('jenis.indexpdf_detail', $data)->setPaper('a4', 'landscape');
        return $pdf->download('jenis.pdf');
    }
}
