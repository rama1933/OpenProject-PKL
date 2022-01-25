<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use PDF;

class TypeController extends Controller
{
    public function index()
    {
       $data['type'] = Type::all();
        return view('type.index', $data);
    }

    public function index_tambah()
    {
        return view('type.index_tambah');
    }

    public function index_edit(Request $request, $id)
    {
        $data['type'] = Type::where('id', $id)->get();

        return view('type.index_edit', $data);
    }

    public function store(Request $request)
    {
        $will_insert = $request->except([ '', '_token']);



        $type = Type::create($will_insert);

        return redirect('type')->with('message', 'Berhasil menyimpan data');
    }

    public function update(Request $request)
    {
        $will_insert = $request->except([ '_token', '_method']);

        $type = Type::where('id', $request->input('id'))->update($will_insert);
        // return response()->json(true);
        return redirect('type')->with('message', 'Berhasil menyimpan data');
    }

    public function hapus(Request $request, $id)
    {

        // hapus data
        Type::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Berhasil menghapus data');
    }

    public function pdf(Request $request)
    {
        $data['type'] = Type::get();
        $pdf = PDF::loadview('type.indexpdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('type.pdf');
    }



    public function pdf_detail(Request $request,$id)
    {

        $data['type'] = Type::where('id',$id)->get();
        $pdf = PDF::loadview('type.indexpdf_detail', $data)->setPaper('a4', 'landscape');
        return $pdf->download('type.pdf');
    }
}
