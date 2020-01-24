<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeds\PermissionsTableSeeder;
use Database\Seeds\RolesTableSeeder;
use Database\Seeds\ConnectRelationshipsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('PermissionsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('ConnectRelationshipsSeeder');
        $this->call('UsersTableSeeder');
        $this->call('ImagesTableSeeder');
        Model::reguard();
    }
}
