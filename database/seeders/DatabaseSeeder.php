<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        User::create([
            'name' => 'Francisco Nava',
            'email' => '2519160076.fnavar@gmail.com',
            'password' => bcrypt('$JFranciscoNavaR$')
        ])->assignRole('admin');
        User::create([
            'name' => 'Jose Rodriguez',
            'email' => 'josefrancisconava07@gmail.com',
            'password' => bcrypt('asdfghjklñ12345')
        ])->assignRole('user');
        //\App\Models\Type::factory(2)->create();
        //\App\Models\Statu::factory(2)->create();
        Storage::deleteDirectory('public/pets');
        Storage::makeDirectory('public/pets');
        //\App\Models\Pet::factory(5)->create();
    }
}
