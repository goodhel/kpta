<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 16px; margin:2px; padding-bottom:2px;"><strong>Lembar Revisi</strong></p>
            <br>
            <table style="width: 100%">    
                <tr>
                    <td style="width: 3%;"></td>
                    <td style="width: 25%;">Nama</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 67%;text-transform: capitalize;">{{$data->nama_mhs}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIM</td>
                    <td>:</td>
                    <td>{{$data->nim}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Bidang keminatan</td>
                    <td>:</td>
                    <td>{{$data->nama_peminatan}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Judul</td>
                    <td>:</td>
                    <td>{{$data->judul}}</td>
                </tr>
            </table>
            <br>
            <table class="revisi">
                <tr>
                    <td></td>
                </tr>
            </table>
            <p style="text-align: justify;margin-top:0px;">
                <strong>Catatan: Revisi diselesaikan paling lambat dua puluh hari kerja setelah seminar hasil dilaksanakan.</strong>
            </p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 45%;"></td>
                    <td style="width: 55%;text-align: center;">Surakarta, {{date("d ", strtotime($semhas->tanggal))}}
                    {{$monthList[date("M", strtotime($semhas->tanggal))]}}{{date(" Y", strtotime($semhas->tanggal))}}
                    <br>Penguji<br><br><br><br><br><strong>{{$penguji1->nama_dosen}}</strong> <br>NIP. {{$penguji1->nip}}</td>
                </tr>
            </table>
        </div>     
    </div>
</div>