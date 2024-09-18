<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = [
            [
                'name' => 'Revan',
                'email' => 'revan@gmail.com',
                'username' => 'revan',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Ralie',
                'email' => 'ralie@gmail.com',
                'username' => 'ralie',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach($user as $data => $val){
            User::create($val);
        }

        $ticket = [
            [
                'nama_pelapor' => 'Delynn',
                'email_pelapor' => 'lyn@gmail.com',
                'sektor' => 'RISA',
                'keluhan' => 'gangguan Wi-Fi',
                'keterangan' => '1',
            ],
            [
                'nama_pelapor' => 'Lily',
                'email_pelapor' => 'Hillary@gmail.com',
                'sektor' => 'BUMA',
                'keluhan' => 'Engsel Laptop Patah',
                'keterangan' => '1',
            ],
        ];

        foreach($ticket as $data => $val){
            Ticket::create($val);
        }
    }
}
