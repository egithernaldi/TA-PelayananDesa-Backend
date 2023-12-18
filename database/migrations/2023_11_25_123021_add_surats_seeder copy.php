<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $jenisSurat = [
            [
                'id' => 1,
                'jenis_surat' => 'S.K DOMISILI'
                
            ],
            [
                'id' => 2,
                'jenis_surat' => 'S.K USAHA'
                
            ],
            [
                'id' => 3,
                'jenis_surat' => 'S.K BELUM MENIKAH'

            ],
            [
                'id' => 4,
                'jenis_surat' => 'S.K IZIN KERAMAIAN'
            ],
        ];

        DB::table('surats')->insert($jenisSurat);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('surats')->truncate();
    }
};
