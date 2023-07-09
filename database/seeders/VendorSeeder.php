<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendors = User::where('role', 'vendor')->get();

        Vendor::factory()
            ->count(count($vendors))
            ->state(new Sequence(fn (Sequence $i) => ['user_id' => $vendors[$i->index]]))
            ->create();
    }
}
