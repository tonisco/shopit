<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $all_users = User::factory()->count(10)->create();

        list('users' => $users, 'vendor_users' => $vendor_users, 'admin_user' => $admin_user) = $this->groupUsers($all_users);

        $vendors = Vendor::factory()
            ->count(count($vendor_users))
            ->state(new Sequence(fn (Sequence $i) => ['user_id' => $vendor_users[$i->index]]))
            ->create();
    }

    public function groupUsers($all_users)
    {
        $users = [];
        $vendor_users = [];
        $admin_user = null;

        foreach ($all_users as $user) {
            if ($user['role'] === 'user') array_push($users, $user);

            else if ($user['role'] === 'vendor') array_push($vendor_users, $user);

            else $admin_user = $user;
        }

        return compact('users', 'vendor_users', 'admin_user');
    }
}
