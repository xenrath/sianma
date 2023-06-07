<?php

namespace Database\Seeders;

use App\Models\Loket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lokets = [
            [
                'nama' => 'Loket 1',
                'kode' => 'A',
                'petugas_id' => '3'
            ],
            [
                'nama' => 'Loket 2',
                'kode' => 'B',
                'petugas_id' => '4'
            ],
        ];

        Loket::insert($lokets);
    }
}
