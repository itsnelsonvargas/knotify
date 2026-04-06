<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AffiliationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $affiliations = [
            ['name' => 'Groom'],        // The Groom.
            ['name' => 'Bride'],        // The Bride.
            ['name' => 'Both'],         // Common friends or family.
            ['name' => 'Organizer'],    // The Wedding Planner and their core coordinators.
            ['name' => 'Vendor'],       // Photographer, HMUA, Florist, Host, DJ.
            ['name' => 'Entourage'],    // Ninongs, Ninangs, Bridesmaids, Groomsmen.
        ];

        DB::table('affiliations')->insert($affiliations);
    }
}
