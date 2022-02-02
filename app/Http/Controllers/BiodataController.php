<?php

namespace App\Http\Controllers;

use App\Biodata;
use Illuminate\Http\Request;
use PDF;

class BiodataController extends Controller
{
    public function index()
    {
       $data['biodata'] = Biodata::all();
        return view('biodata.index', $data);
    }

     public function index_user()
    {
       $data['biodata'] = Biodata::where('id',auth()->user()->biodata_id)->get();
        return view('biodata.index_user', $data);
    }

    public function index_tambah()
    {
        return view('biodata.index_tambah');
    }

    public function index_edit(Request $request, $id)
    {
        $data['biodata'] = Biodata::where('id', $id)->get();

        return view('biodata.index_edit', $data);
    }

      public function index_edit_user(Request $request, $id)
    {
        $data['biodata'] = Biodata::where('id', $id)->get();

        return view('biodata.index_edit_user', $data);
    }

    public function store(Request $request)
    {
        $will_insert = $request->except([ 'tanggal_lahir', '_token']);
        $date = strtotime($request->tanggal_lahir);
        $will_insert['tanggal_lahir'] = date('Y-m-d',$date);

        $biodata = Biodata::create($will_insert);

        return redirect('biodata')->with('message', 'Berhasil menyimpan data');
    }

    public function update(Request $request)
    {
        $will_insert = $request->except([ 'tanggal_lahir','_token', '_method']);
        $date = strtotime($request->tanggal_lahir);
        $will_insert['tanggal_lahir'] = date('Y-m-d',$date);

        $biodata = Biodata::where('id', $request->input('id'))->update($will_insert);
        // return response()->json(true);
        return redirect('biodata')->with('message', 'Berhasil menyimpan data');
    }

    public function update_user(Request $request)
    {
        $will_insert = $request->except([ 'tanggal_lahir','_token', '_method']);
        $date = strtotime($request->tanggal_lahir);
        $will_insert['tanggal_lahir'] = date('Y-m-d',$date);

        $biodata = Biodata::where('id', $request->input('id'))->update($will_insert);
        // return response()->json(true);
        return redirect('biodata_user')->with('message', 'Berhasil menyimpan data');
    }

    public function hapus(Request $request, $id)
    {

        // hapus data
        Biodata::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Berhasil menghapus data');
    }

    public function pdf(Request $request)
    {
        $data['biodata'] = Biodata::get();
        $pdf = PDF::loadview('biodata.indexpdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('biodata.pdf');
    }



    public function pdf_detail(Request $request,$id)
    {

        $data['biodata'] = Biodata::where('id',$id)->get();
        $pdf = PDF::loadview('biodata.indexpdf_detail', $data)->setPaper('a4', 'landscape');
        return $pdf->download('biodata.pdf');
    }
}
