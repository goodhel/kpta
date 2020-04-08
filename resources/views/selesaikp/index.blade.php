@extends('layouts.backend')

@section('title','Selesai KP')
@section('css_after')
<link href="{{asset('/css/jquery-ui.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- Page Content -->
<div class="content">
<!-- Labels on top -->
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Upload Dokumen Selesai Kerja Praktek</h3>
    </div>
    <div class="block-content block-content-full">
        <!-- <h3 class="text-center my-5">Tutorial Laravel #30 : Membuat Upload File Dengan Laravel</h3> -->
 
        <div class="col-lg-8 mx-auto my-5">	
            @if(session()->get('message'))
            <div class="alert alert-info alert-dismissable row" role="alert">
                <strong>Success</strong> {{ session()->get('message') }}  
            </div>
            @endif
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }} <br/>
                @endforeach
            </div>
            @endif
            <form action="{{ route('kp.selesaikp.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group row">
                    <label>File Upload PDF</label>
                    <div class="custom-file">
                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                        <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                        <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="file_selesaikp" data-toggle="custom-file-input" multiple>
                        <label class="custom-file-label" for="example-file-multiple-input-custom">Choose files</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tanggal Mulai">Tanggal Mulai KP</label>
                    <input type="text" class="js-flatpickr form-control bg-white" id="tgl_mulai_kp" value="{{old('tgl_mulai_kp')}}" name="tgl_mulai_kp" placeholder="Y-m-d">
                    <div class="text-danger">{{ $errors->first('tlg_mulai_kp')}}</div>
                </div>
                <div class="form-group row">
                    <label for="Tanggal Selesai">Tanggal Selesai KP</label>
                    <input type="text" class="js-flatpickr form-control bg-white" id="tgl_selesai_kp" value="{{old('tgl_selesai_kp')}}" name="tgl_selesai_kp" placeholder="Y-m-d">
                    <div class="text-danger">{{ $errors->first('tgl_selesai_kp')}}</div>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="nim" value="{{ $data->nim }}">
                </div>
                <div class="form-group row">
                    <input type="submit" value="Upload" class="btn btn-primary mr-5 mb-5">
                    @if($data->file_selesaikp != null)
                    <input id="btnShow" type="button" value="Show PDF" class="btn btn-warning mr-5 mb-5"/>
                    <div id="dialog" style="display: none"></div>
                    @endif   
                </div>
            </form>
        </div>

    </div>
</div>
<!-- END Labels on top -->
</div>

@endsection

@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['flatpickr']); });</script>
<script src="{{asset('/js/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
        $(function () {
            var fileName = "{{$data->nama_mhs}}";
            $("#btnShow").click(function () {
                $("#dialog").dialog({
                    modal: true,
                    title: fileName,
                    width: 750,
                    height: 500,
                    buttons: {
                        Close: function () {
                            $(this).dialog('close');
                        }
                    },
                    open: function () {
                        var object = "<object data=\"{FileName}\" type=\"application/pdf\" width=\"710px\" height=\"350px\">";
                        object += "If you are unable to view file, you can download from <a style = \"color:blue\"  href=\"{{ asset('file_selesaikp/'.$data->file_selesaikp)}}\">here</a>";
                        object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                        object += "</object>";
                        object = object.replace(/{FileName}/g, "{{ asset('file_selesaikp/'.$data->file_selesaikp)}}"    );
                        $("#dialog").html(object);
                    }
                });
            });
        });
    </script>
@endsection
