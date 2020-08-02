<?php

namespace App\Http\Controllers\Admin\Kalab;

use App\Models\Pendadaran;
use App\Models\Mahasiswa;
use App\Models\Bebaslab;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;

class KalabController extends Controller
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
        $data = Pendadaran::listpendadaransetuju();
        // dd($data);
        return view('admin.kalab.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mahasiswa::find($id);
        $bebaslab = Bebaslab::where('mahasiswa_id',$id)->get()->last();
        // dd($bebaslab);
        return view('admin.kalab.show',compact('data','bebaslab'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if (Gate::allows('kalabsel')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_sel' => 1,
                'tgl_kalab_sel' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('kalabtele')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_tele' => 1,
                'tgl_kalab_tele' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('kalabik')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_ik' => 1,
                'tgl_kalab_ik' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('kalabele')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'kalab_elektronika' => 1,
                'tgl_kalab_elektronika' => date('Y-m-d'),
            ]);
        }elseif(Gate::allows('laboranele')) {
            Bebaslab::updateOrCreate(['mahasiswa_id' => $id],[
                'laboran_elektronika' => 1,
                'tgl_laboran_elektronika' => date('Y-m-d'),
            ]);
        }else{
            dd('Bukan Kalab');
        }

        return redirect()->back()->with('message','Surat Bebas Lab Berhasil Disetujui!');
    }
}
