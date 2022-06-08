<?php
/**
 * Author: Larissa De Barros
 * Date: 19.05.2022
 * Description: Creates the administrator
 */
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.ch',
            'password' => Hash::make('123456789'),
            'is_admin' => true
        ]);

    }
}
