@extends('layouts.backend')

@section('title','Tawaran Topik TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Tawaran Topik Tugas Akhir</h2>
    <form action="{{ route('dosen.tawaran.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Topik Tugas Akhir</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Pemberi Topik</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nama" value="{{$dosen->nama_dosen}}" readonly>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="dosen_id" value="{{$dosen->id}}" hidden>
                    <input type="hidden" class="form-control" name="isAmbil" value="0" hidden>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Jenis Topik</label>
                        <div class="col-md-12">
                            <select required name="jenis_topik" class="form-control js-select2">
                                <option value="">Pilih Jenis Topik</option>
                                <option value="1">Topik Proyek Kreatif</option>
                                <option value="2">Topik Capstone Design</option>
                                <option value="3">Topik Tugas Akhir</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('jenis_topik') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Nama Proyek</label>
                        <div class="col-md-12">
                            <input required type="text" class="form-control" name="nama_proyek" value="{{old('nama_proyek')}}" placeholder="eg : IOT untuk Smart Building">
                            <span class="text-danger">{{ $errors->first('nama_proyek') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Judul Topik</label>
                        <div class="col-md-12">
                            <textarea required type="text" class="form-control" id="judul_topik" name="judul_topik" rows="4" placeholder="Masukkan judul topik ta">{{old('judul_topik')}}</textarea>
                            <span class="text-danger">{{ $errors->first('judul_topik') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Penjelasan</label>
                        <div class="col-md-12">
                            <textarea required type="text" class="form-control" id="penjelasan" name="penjelasan" rows="6" placeholder="Deskripsi singkat">{{old('penjelasan')}}</textarea>
                            <span class="text-danger">{{ $errors->first('penjelasan') }}</span>
                        </div>
                    </div>                      
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Hardware & Software</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Hardware</label>
                        <div class="col-md-12">
                            <textarea required type="text" class="form-control" id="hardware" name="hardware" rows="4" placeholder="Hardware yang digunakan">{{old('hardware')}}</textarea>
                            <span class="text-danger">{{ $errors->first('hardware') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Software</label>
                        <div class="col-md-12">
                            <textarea required type="text" class="form-control" id="software" name="software" rows="4" placeholder="Software yang digunakan">{{old('software')}}</textarea>
                            <span class="text-danger">{{ $errors->first('software') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <button type="submit" class="btn btn-alt-primary">Submit</button>
                            <a href="{{route('dosen.tawaran.index')}}" class="btn btn-alt-secondary mb-5">Kembali</a>
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
<script>jQuery(function(){ Codebase.helpers(['select2']); });</script>
@endsection