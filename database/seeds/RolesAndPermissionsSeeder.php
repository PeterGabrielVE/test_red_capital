<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

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

        $superadmin = Role::create(['name' => 'super-admin','guard_name'=>'web']);
        $superadmin->givePermissionTo(Permission::all());
        $role1 = Role::create(['name' => 'user','guard_name'=>'web']);
    }
}
