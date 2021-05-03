<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usernya = [
            [
                'name' => 'Eka Aribawa,S.Pd.I',
                'email' => 'arieka@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Lutfi Pujianti,S.E',
                'email' => 'lutfi@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Tony Kusetiyono,S.E.',
                'email' => 'tonyk@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Isti Malinda,S.Pd',
                'email' => 'linda@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Aroem Santi Litania,S.Pd',
                'email' => 'aroemlit@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Dianing Ratri O,S.Pd',
                'email' => 'dianingratrio@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Tito Dwi Yulianto,S.Pd,Gr.',
                'email' => 'tito@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Ida Fahruroziyah,S.Pd',
                'email' => 'idafahruroz@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Khusnul Khotimah,S.Pd',
                'email' => 'khusnul@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Askuriati,S.E',
                'email' => 'askuriati@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Soimatun,S.Pd',
                'email' => 'soimatun@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Siti Masruroh,A.Md',
                'email' => 'rurohjio@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Rufri Tri Irianti,S.Pd',
                'email' => 'ruficivic@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Indah Dwi Putri Banjarsari,S.Pd',
                'email' => 'indahdwi@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Indah Noviani,S.Pd',
                'email' => 'indahnope@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'Arif Adi Wijaya,S.Pd',
                'email' => 'arifadiwijaya@binusasmg.sch.id',
                'password' => bcrypt('12345678')
            ],
        ];
        User::insert($usernya);
    }
}
