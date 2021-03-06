@extends('layouts.backend')

@section('title','Biodata Alumni')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Biodata Alumni</h2>
    <form action="{{route('ta.alumni.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mahasiswa</h3>
                </div>
                <div class="block-content">
                    <input type="hidden" class="form-control" name="mahasiswa_id" value="{{$data->mahasiswa_id}}">
                    <div class="form-group row">
                        <label class="col-3">Nama <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="text" class="form-control" name="nama" value="{{$data->nama_mhs}}" placeholder="Masukkan Nama">
                            <div class="text-danger">{{ $errors->first('nama')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">NIM <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="text" class="form-control" name="nim" value="{{$data->nim}}" placeholder="Masukkan NIM">
                            <div class="text-danger">{{ $errors->first('nim')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Tempat/Tgl. Lahir <span class="text-danger">*</span></label>
                        <div class="col-md-4">
                            <input required type="text" class="form-control" name="tempat_lahir" value="{{old('tempat_lahir')}}" placeholder="Masukkan Tempat Lahir">
                            <div class="text-danger">{{ $errors->first('tempat_lahir')}}</div>
                        </div>
                        <div class="col-md-1">/</div>
                        <div class="col-md-4">
                            <input required type="text" class="js-flatpickr form-control bg-white" value="{{old('tgl_lahir')}}" name="tgl_lahir" placeholder="Y-m-d">
                            <div class="text-danger">{{ $errors->first('tgl_lahir')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Agama <span class="text-danger">*</span></label>
                        <div class="col-md-3">
                            <input required type="text" class="form-control" name="agama" value="{{old('agama')}}" placeholder="Masukkan Agama">
                            <div class="text-danger">{{ $errors->first('agama')}}</div>
                        </div>
                        <label class="col-2">Jenis Kelamin <span class="text-danger">*</span></label>
                        <div class="col-md-4">
                            <select required name="jenis_kelamin" id="jenis_kelamin" class="js-select2 form-control">
                                <option value="">Jenis Kelamin</option>
                                <option value="1" {{old('jenis_kelamin') == 1 ? 'selected' : ''}}>Laki-Laki</option>
                                <option value="2" {{old('jenis_kelamin') == 2 ? 'selected' : ''}}>Perempuan</option>
                            </select>
                            <div class="text-danger">{{ $errors->first('jenis_kelamin')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Tanggal Masuk <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="text" class="js-flatpickr form-control bg-white" value="{{old('tgl_masuk')}}" name="tgl_masuk" placeholder="Y-m-d">
                            <div class="text-danger">{{ $errors->first('tgl_masuk')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Tanggal Lulus <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="text" class="js-flatpickr form-control bg-white" value="{{old('tgl_lulus')}}" name="tgl_lulus" placeholder="Y-m-d">
                            <div class="text-danger">{{ $errors->first('tgl_lulus')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Alamat Rumah <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="alamat" class="form-control" rows="2" placeholder="Masukkan Alamat Rumah">{{old('alamat')}}</textarea>
                            <div class="text-danger">{{ $errors->first('alamat')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Email <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Masukkan Email">
                            <div class="text-danger">{{ $errors->first('email')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">No Telephon (rumah)<span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="text" class="form-control" name="no_rumah" value="{{old('no_rumah')}}" placeholder="Masukkan No Telp Rumah">
                            <div class="text-danger">{{ $errors->first('no_rumah')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">No Telephon (Hp)<span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="text" class="form-control" name="no_hp" value="{{old('no_hp')}}" placeholder="Masukkan No Telp Hp">
                            <div class="text-danger">{{ $errors->first('no_hp')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Nilai Tugas Akhir <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="text" class="form-control" name="nilai_ta" value="{{old('nilai_ta')}}" placeholder="Masukkan Nilai Tugas Akhir eg. 86 (A)">
                            <div class="text-danger">{{ $errors->first('nilai_ta')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">IPK Terakhir <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="number" step="0.01" min="0" max="100" class="form-control" name="ipk_terakhir" value="{{old('ipk_terakhir')}}" placeholder="Masukkan Nilai IPK Terakhir">
                            <div class="text-danger">{{ $errors->first('ipk_terakhir')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Capaian SKS <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="number" step="1" min="0" class="form-control" name="capaian_sks" value="{{old('capaian_sks')}}" placeholder="Masukkan Capaian SKS">
                            <div class="text-danger">{{ $errors->first('capaian_sks')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Lama Masa Studi <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="text" class="form-control" name="masa_studi" value="{{old('masa_studi')}}" placeholder="Masukkan Lama Masa Studi eg. 4 Tahun 5 Bulan">
                            <div class="text-danger">{{ $errors->first('masa_studi')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Bidang Ilmu <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input required type="text" class="form-control" name="bidang_ilmu" value="{{old('bidang_ilmu')}}" placeholder="Masukkan Bidang Ilmu">
                            <div class="text-danger">{{ $errors->first('bidang_ilmu')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Judul Tugas Akhir (B. Indonesia) <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea required name="judul_ind" class="form-control" rows="4" placeholder="Masukkan Judul Bahasa Indonesia">{{old('judul_ind')}}</textarea>
                            <div class="text-danger">{{ $errors->first('judul_ind')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Judul Tugas Akhir (B. Inggris) <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea required name="judul_eng" class="form-control" rows="4" placeholder="Masukkan Judul Bahasa Inggris">{{old('judul_eng')}}</textarea>
                            <div class="text-danger">{{ $errors->first('judul_eng')}}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="Submit">Submit</button>
                            <a href="{{route('ta.wisuda.index')}}" class="btn btn-secondary ml-5">Kembali</a>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection

@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['select2','flatpickr']); });</script>
@endsection