<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detailsurat extends Model
{
    protected $table = 'detailsurats';

    protected $fillable = [
        'id_user',
        'id_surat',
        'tanggal_kegiatan',
        'tempat_kegiatan',
        'nama_kegiatan',
        'status_perkawinan',
        'kewarganegaraan',
        'tempat_usaha',
        'nama_usaha',
        'no_hp',
        'umur',
        'status_pengajuan'
    ];

    

    const STATUS_WAITING = 1;
    const STATUS_APPROVED = 2;
    const STATUS_REJECTED = 3;
    const STATUS_DONE = 4;

    public function getStatusAttribute()
    {
        $status = '';

        switch ($this->status_pengajuan) {
            case self::STATUS_WAITING:
                $status = "<span class='badge badge-info'>Menunggu Verifikasi</span>";
                break;
            case self::STATUS_APPROVED:
                $status = "<span class='badge badge-success'>Verifikasi Berhasil</span>";
                break;
            case self::STATUS_REJECTED:
                $status = "<span class='badge badge-danger'>Verifikasi Gagal</span>";
                break;
            case self::STATUS_DONE:
                $status = "<span class='badge badge-primary'>Selesai</span>";
                break;
        }

        return $status;
    }
}
