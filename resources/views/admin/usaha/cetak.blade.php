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
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    {{ $detail['jenis_kelamin'] }}
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
                <td>Alamat</td>
                <td>:</td>
                <td>
                    {{ $detail['alamat'] }}
                </td>
            </tr>
        </tbody>
    </table>
    <p>Sesuai dengan keterangan yang bersangkutan benar nama tersebut diatas akan/memiliki usaha sebagai berikut:</P>
        <table>
            <tbody>
                <tr>
                    <td>Nama Usaha</td>
                    <td>:</td>
                    <td>
                        {{ $detail->nama_usaha }}
                    </td>
                </tr>
                <tr>
                    <td>Tempat Usaha</td>
                    <td>:</td>
                    <td>
                        {{ $detail->tempat_usaha }}
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Usaha</td>
                    <td>:</td>
                    <td>
                        {{ date('d-m-Y') }}
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
        Pemilik Surat,
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
