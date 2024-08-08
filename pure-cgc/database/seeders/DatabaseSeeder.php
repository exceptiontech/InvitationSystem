<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(PagesMnusSeeder::class);
        $this->call(StaticPagesSeeder::class);
        $this->call(SocialMediaSeeder::class);
        $this->call(SettingMsSeeder::class);
        $this->call(UsersTableSeeder::class);




    }
}
