<?php

namespace App\Http\Controllers;

use App\Merk;
use Illuminate\Http\Request;
use PDF;

class MerkController extends Controller
{
    public function index()
    {
       $data['merk'] = Merk::all();
        return view('merk.index', $data);
    }

    public function index_tambah()
    {
        return view('merk.index_tambah');
    }

    public function index_edit(Request $request, $id)
    {
        $data['merk'] = Merk::where('id', $id)->get();

        return view('merk.index_edit', $data);
    }

    public function store(Request $request)
    {
        $will_insert = $request->except([ '', '_token']);



        $merk = Merk::create($will_insert);

        return redirect('merk')->with('message', 'Berhasil menyimpan data');
    }

    public function update(Request $request)
    {
        $will_insert = $request->except([ '_token', '_method']);

        $merk = Merk::where('id', $request->input('id'))->update($will_insert);
        // return response()->json(true);
        return redirect('merk')->with('message', 'Berhasil menyimpan data');
    }

    public function hapus(Request $request, $id)
    {

        // hapus data
        Merk::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Berhasil menghapus data');
    }

    public function pdf(Request $request)
    {
        $data['merk'] = Merk::get();
        $pdf = PDF::loadview('merk.indexpdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('merk.pdf');
    }



    public function pdf_detail(Request $request,$id)
    {

        $data['merk'] = Merk::where('id',$id)->get();
        $pdf = PDF::loadview('merk.indexpdf_detail', $data)->setPaper('a4', 'landscape');
        return $pdf->download('merk.pdf');
    }
}
