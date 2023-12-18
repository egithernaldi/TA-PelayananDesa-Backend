<!DOCTYPE html>
<html lang="en">

<head>
    <title>CETAK SURAT</title>
</head>
<style>
    h3,
    h5 {
        margin-top: -20px;
    }
    .tata-letak {
            display: flex;
            justify-content: space-between;
        }

        .penanggung-jawab,
        .wali-nagari {
            width: 45%; /* Sesuaikan lebar sesuai kebutuhan */
            text-align: left; /* Sesuaikan posisi teks sesuai kebutuhan */
        }
</style>

<body>
    <center>

        <h2>PEMERINTAH KABUPATEN PADANG PARIAMAN</h2>
        <h3>KECAMATAN BATANG ANAI
            <br>NAGARI SUNGAI BULUH
        </h3>
        <h5>Alamat : Jalanin Aja Dulu, Batang Anai kode Pos (25586)</h5>
        <h3>________________________________________________________________________</h3>

    </center>

    <center>
        <h4>
            <u>{{ $detail->jenis_surat }}</u>
        </h4>
        <h4>Nomor :
            {{ $detail['id'] }}/{{ date('dmY') }}
        </h4>
    </center>
    <p>Yang bertandatangan dibawah ini, menerangkan bahwa :</P>
    <table>
        <tbody>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>
                    {{ $detail['nik'] }}
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                    {{ $detail['nama'] }}
                </td>
            </tr>
            <tr>
                <td>Tempat, Tgl lahir</td>
                <td>:</td>
                <td>
                    {{ $detail['tempat_lahir'] }},{{ $detail['tanggal_lahir'] }}
                </td>
            </tr>
            <tr>
                <td>Kewarganegaraan/Agama</td>
                <td>:</td>
                <td>
                    {{ $detail['kewarganegaraan'] }}/{{ $detail->agama }}
                </td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>
                    {{ $detail['pekerjaan'] }}
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    {{ $detail['alamat'] }}
                </td>
            </tr>
        </tbody>
    </table>
    <p>Memohon Izin Keramaian yang Akan diadakan pada:</P>
        <table>
            <tbody>
                <tr>
                    <td>Tanggal Kegiatan</td>
                    <td>:</td>
                    <td>
                        {{ $detail->tanggal_kegiatan }}
                    </td>
                </tr>
                <tr>
                    <td>Tempat Kegiatan</td>
                    <td>:</td>
                    <td>
                        {{ $detail->tempat_kegiatan }}
                    </td>
                </tr>
                <tr>
                    <td>Kegiatan yang Dilaksanakan</td>
                    <td>:</td>
                    <td>
                        {{ $detail->nama_kegiatan }}
                    </td>
                </tr>
            </tbody>
        </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="tata-letak">
    <p  class="penanggung-jawab">
        Penanggung Jawab,
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>{{ $detail->nama }}
    </p>
    <p  class="wali-nagari">
        Dukuhmulyo, {{ date('d-m-Y') }}
        <br> a/n Wali Nagari
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>(SUYONO)
    </p>
    </div>

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
