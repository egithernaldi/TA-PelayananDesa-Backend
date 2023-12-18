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
        $users= [
            [
                'id' => 1,
                'nama' => 'Egit Hernaldi',
                'nik'=>'123',
                'password' => bcrypt('123'),
                'email' => 'egithrnld29@gmail.com',
                'no_hp'=> '085214980760',
                'role' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('users')->insert($users);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('users')->truncate();
    }
};
