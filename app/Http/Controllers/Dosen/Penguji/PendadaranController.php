<?php

namespace App\Http\Controllers\Dosen\Penguji;

use App\Models\Dosen;
use App\Models\Nilaipendadaranpenguji;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendadaranController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Dosen::pengujipendadaran(Auth::user()->nim);
        // // dd($data);
        // return view('dosen.pendadaran.penguji.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_penguji' => 'required',
            'a1' => 'required',
            'a2' => 'required',
            'a3' => 'required',
            'a4' => 'required',
            'b1' => 'required',
            'b2' => 'required',
            'b3' => 'required',
            'b4' => 'required',
            'b5' => 'required',
            'c1' => 'required',
            'c2' => 'required',
            'c3' => 'required',
            'revisi' => 'required',
        ]);

        $a = ($request->a1 + $request->a2 + $request->a3 + $request->a4) / 400 * 30;
        $b = ($request->b1 + $request->b2 + $request->b3 + $request->b4 + $request->b5) / 500 * 40;
        $c = ($request->c1 + $request->c2 + $request->c3) / 300 * 30;
        $total = $a + $b + $c;

        Nilaipendadaranpenguji::Create([
            'ta_penguji_id' => $request->id_penguji,
            'a1' => $request->a1,
            'a2' => $request->a2,
            'a3' => $request->a3,
            'a4' => $request->a4,
            'b1' => $request->b1,
            'b2' => $request->b2,
            'b3' => $request->b3,
            'b4' => $request->b4,
            'b5' => $request->b5,
            'c1' => $request->c1,
            'c2' => $request->c2,
            'c3' => $request->c3,
            'revisi' => $request->revisi,
            'total' => $total,
        ]);

        return redirect()->back()->with('message','Nilai berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Dosen::getpengujipendadaran($id,Auth::user()->nim);
        $nilai = Nilaipendadaranpenguji::where('ta_penguji_id', $data->id)->first();
        if($nilai != null){
            // dd($data);
            return view('dosen.pendadaran.penguji.finalisasi',compact('data','nilai'));
        }else{
            return view('dosen.pendadaran.penguji.view',compact('data'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dosen::getpengujipendadaran($id,Auth::user()->nim);
        $nilai = Nilaipendadaranpenguji::where('ta_penguji_id', $data->id)->first();
        if($nilai->status_nilai == 0){
            // dd($data);
            return view('dosen.pendadaran.penguji.edit',compact('data','nilai'));
        }else{
            return redirect()->back();
        }
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
        $validatedData = $request->validate([
            'a1' => 'required',
            'a2' => 'required',
            'a3' => 'required',
            'a4' => 'required',
            'b1' => 'required',
            'b2' => 'required',
            'b3' => 'required',
            'b4' => 'required',
            'b5' => 'required',
            'c1' => 'required',
            'c2' => 'required',
            'c3' => 'required',
            'revisi' => 'required',
        ]);

        $a = ($request->a1 + $request->a2 + $request->a3 + $request->a4) / 400 * 30;
        $b = ($request->b1 + $request->b2 + $request->b3 + $request->b4 + $request->b5) / 500 * 40;
        $c = ($request->c1 + $request->c2 + $request->c3) / 300 * 30;
        $total = $a + $b + $c;

        Nilaipendadaranpenguji::where('id',$id)->update([
            'a1' => $request->a1,
            'a2' => $request->a2,
            'a3' => $request->a3,
            'a4' => $request->a4,
            'b1' => $request->b1,
            'b2' => $request->b2,
            'b3' => $request->b3,
            'b4' => $request->b4,
            'b5' => $request->b5,
            'c1' => $request->c1,
            'c2' => $request->c2,
            'c3' => $request->c3,
            'revisi' => $request->revisi,
            'total' => $total,
        ]);

        return redirect(route('dosen.pendadaran.index'))->with('message','Update nilai berhasil disimpan!');
    }

    public function finalisasi(Request $request, $id)
    {
        Nilaipendadaranpenguji::where('id',$id)->update([
            'status_nilai' => 1,
        ]);

        return redirect()->back()->with('message','Nilai telah di Submit.');
    }

    public function updateStatus(Request $request)
    {
        $pem = Nilaipendadaranpenguji::findOrFail($request->pem_id);
        $pem->status_nilai = $request->status;
        $pem->save();

        // return redirect()->back();
        return response()->json(['message' => 'User status updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
