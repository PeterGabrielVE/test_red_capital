<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use \App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'upload file','guard_name'=>'web']);
        Permission::create(['name' => 'download file','guard_name'=>'web']);

        $superadmin = Role::create(['name' => 'super-admin','guard_name'=>'web']);
        $superadmin->givePermissionTo(Permission::all());

        $role1 = Role::create(['name' => 'user','guard_name'=>'web']);
        $role1->givePermissionTo('upload file');
        $role1->givePermissionTo('download file');

        $user = factory(User::class)->create([
            'name' => 'Example User',
            'email' => 'test@mail.com',
        ]);
        $user->assignRole($role1);

        $user = factory(User::class)->create([
            'name' => 'Example Admin User',
            'email' => 'admin@mail.com',
        ]);
        $user->assignRole($superadmin);
    }
}
