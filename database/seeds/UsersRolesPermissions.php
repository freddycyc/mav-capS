<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class UsersTableSeeder extends Seeder {
    public function run(){
        DB::table('users')->delete();
        User::create([  'first_name' => 'Administrator', 'middle_name' => 'A', 'last_name' => 'Admin',
            'password' => bcrypt('testing'), 'email' => 'test@test.com', 'role_request' => 'admin', 'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Administrator'; // optional
        $admin->description  = 'User is allowed to create and manage managers'; // optional
        $admin->save();

        $manager = new Role();
        $manager->name         = 'manager';
        $manager->display_name = 'Manager'; // optional
        $manager->description  = 'User is allowed to perform manager functions'; // optional
        $manager->save();
    }
}

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->delete();

        $create = new Permission();
        $create->name         = 'create';
        $create->display_name = 'Create Function'; // optional
        $create->description  = 'perform create'; // optional
        $create->save();

        $read = new Permission();
        $read->name         = 'read';
        $read->display_name = 'Read Function'; // optional
        $read->description  = 'perform read'; // optional
        $read->save();

        $update = new Permission();
        $update->name         = 'update';
        $update->display_name = 'Update Function'; // optional
        $update->description  = 'perform update'; // optional
        $update->save();

        $delete = new Permission();
        $delete->name         = 'delete';
        $delete->display_name = 'Delete Function'; // optional
        $delete->description  = 'perform delete'; // optional
        $delete->save();
    }
}

class RolesUsersTableSeeder extends Seeder {
    public function run() {
        DB::table('role_user')->delete();

        $role = Role::where('name','admin')->first();
        $admin = User::where('first_name','Administrator')->first();
        $admin->attachRole($role);
    }
}

class UsersRolesPermissionsTableSeeder extends Seeder {
    public function run() {
        DB::table('permission_role')->delete();

        $create = Permission::where('name','=','create')->first();
        $read = Permission::where('name','=','read')->first();
        $update = Permission::where('name','=','update')->first();
        $delete = Permission::where('name','=','delete')->first();

        $admin = Role::where('name','=','admin')->first();
        $admin->attachPermissions(array($create,$read,$update,$delete));

        $manager = Role::where('name','=','manager')->first();
        $manager->attachPermissions(array($create,$read,$update,$delete));
    }
}