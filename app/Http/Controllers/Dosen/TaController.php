<?php

namespace App\Http\Controllers\Dosen;

use App\Models\Dosen;
use App\Models\Ta;
use App\Models\Pembimbing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaController extends Controller
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
        $data = Dosen::bimbinganta(Auth::user()->nim);
        // dd($data);
        return view('dosen.ta.list_ta',compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Dosen::getbimbingan($id,Auth::user()->nim);
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        // dd($data);
        return view('dosen.ta.view_ta',compact('data','pembimbing','matkul'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Dosen::getbimbingan($id,Auth::user()->nim);
        $matkul = Ta::matkul($id);
        $pembimbing = Pembimbing::pembimbing($id);
        // dd($data);
        return view('dosen.ta.edit_ta',compact('data','pembimbing','matkul'));
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
            'id_pembimbing' => 'required',
        ]);

        switch ($request->input('action')) {
            case 'setuju':
                Pembimbing::where([
                    ['id', '=', $id],
                    ['pembimbing', '=', $request->id_pembimbing]
                ])->update([
                    'status_pem' => 'SETUJU',
                ]);
                return redirect(route('dosen.ta.index'))->with('message','Update Data Pembimbing Berhasil!');
                break;
    
            case 'tolak':
                Pembimbing::where([
                    ['id', '=', $id],
                    ['pembimbing', '=', $request->id_pembimbing]
                ])->update([
                    'status_pem' => 'TOLAK',
                ]);
                return redirect(route('dosen.ta.index'))->with('message','Update Data Pembimbing Berhasil!');
                break;
        }
        // dd($validatedData);

        // DB::table('pembimbing')->where([
        //         ['id', '=', $id],
        //         ['pembimbing', '=', $request->id_pembimbing]
        //     ])->update([
        //         'status_pem' => 'SETUJU',
        //     ]);
        // return redirect(route('dosen.ta.index'))->with('message','Update Data Pembimbing Berhasil!');
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
