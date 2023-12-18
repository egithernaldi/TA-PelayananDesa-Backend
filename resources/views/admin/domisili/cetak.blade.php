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
            {{ $detail['id'] }} / {{ date('dmY') }}
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
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>
                    {{ $detail['kewarganegaraan'] }}
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
                <td>Agama</td>
                <td>:</td>
                <td>
                    {{ $detail['agama'] }}
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
    <p>Orang tersebut diatas benar-benar penduduk Nagari Sungai Buluh Kecamatan Batang Anai Kabupaten Padang Pariaman</p>
    <p>Demikian atas perhatian dan kerjasamanya kami ucapkan terima kasih.</P>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p align="right">
        Dukuhmulyo, {{ date('dmY') }}
        <br> a/n Wali Nagari
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>(SUYONO)
    </p>

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
