<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        //create permissions
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'read role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'read permissions']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);

        //crear los roles y asignar los permisos creados
        $role = Role::create(['name' => 'editor']);//crea los roles
        $role->givePermissionTo('read users');//asigna los permisos
        $role->givePermissionTo('update user');

        $role = Role::create(['name' => 'moderador']);//crea los roles
        $role->givePermissionTo('create user');//asigna los permisos
        $role->givePermissionTo('read users');
        $role->givePermissionTo('update user');
        $role->givePermissionTo('delete user');

        $role = Role::create(['name' => 'super-admin']);//crea los roles
        $role->givePermissionTo(Permission::all());
    }
}
