<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'view']);
        Permission::create(['name'=>'add']);
        Permission::create(['name'=>'edit']);
        Permission::create(['name'=>'delete']);
        $role = Role::create(['name'=>'client']);
        $role->givePermissionTo('view');
        $role->givePermissionTo('add');

        $role = Role::create(['name'=>'service_provider']);
        $role->givePermissionTo('view');
        $role->givePermissionTo('add');
        $role->givePermissionTo('edit');
        $role->givePermissionTo('delete');

        $role = Role::create(['name'=>'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
