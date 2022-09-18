<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Inventarios']);
        $role3 = Role::create(['name' => 'Cotizaciones']);

        Permission::create(['name' => 'admin.users.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.update'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.delete'])->assignRole($role1);

        Permission::create(['name' => 'inventarios.almacenes.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'inventarios.almacenes.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'inventarios.almacenes.update'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'inventarios.categorias.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'inventarios.categorias.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'inventarios.categorias.update'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'inventarios.productos.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'inventarios.productos.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'inventarios.productos.update'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'inventarios.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'inventarios.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'inventarios.update'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'cotizaciones.index'])->assignRole($role3);
        Permission::create(['name' => 'cotizaciones.create'])->assignRole($role3);
        Permission::create(['name' => 'cotizaciones.update'])->assignRole($role3);
    }
}
