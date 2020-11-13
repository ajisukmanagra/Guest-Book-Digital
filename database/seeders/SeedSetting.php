<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SeedSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = [
            [
                'nama' => 'Kepala Sekolah',
                'email' => 'kepsek@email.com',
            ],
            [
                'nama' => 'Tata Usaha',
                'email' => 'tu@email.com',
            ],
            [
                'nama' => 'Kesiswaan',
                'email' => 'kesiswaan@email.com',
            ],
            [
                'nama' => 'Kurikulum',
                'email' => 'kurikulum@email.com',
            ],
            [
                'nama' => 'Humas',
                'email' => 'humas@email.com',
            ],
            [
                'nama' => 'Ketua Jurusan',
                'email' => 'ketua_jurusan@email.com',
            ],
            [
                'nama' => 'Wali Kelas',
                'email' => 'wali_kelas@email.com',
            ],
        ];

        foreach ($setting as $key => $value) {
            Setting::create($value);
        }
    }
}
