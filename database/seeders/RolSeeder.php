<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rolAdministrador = Role::create(['name' => 'Administrador']);
        $rolAnalista = Role::create(['name' => 'Analista']);

        //Permisos para El modelo de Usuarios 
        Permission::create(['name' => 'admin.users.index', 
                            'description' => 'Ver Dashboard de Administrador'])->assignRole($rolAdministrador);
        Permission::create(['name' => 'admin.users.create',
                            'description' => 'Crear un Usuario'])->assignRole($rolAdministrador);;
        Permission::create(['name' => 'admin.users.show',
                            'description' => 'Ver el usuario'])->assignRole($rolAdministrador);;
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Editar Usuario'])->assignRole($rolAdministrador);;
        Permission::create(['name' => 'admin.users.destroy',
                            'description' => 'Eliminar Usuario'])->assignRole($rolAdministrador);;

        //Permisos para El Modelo de ESTADO
        Permission::create(['name' => 'estados.index',
                            'description' => 'Ver lista de Estados'])->assignRole($rolAdministrador);
        Permission::create(['name' => 'estados.create',
                            'description' => 'Registrar Estado'])->assignRole($rolAdministrador);;
        Permission::create(['name' => 'estados.show',
                            'description' => 'Ver Estado'])->assignRole($rolAdministrador);;
        Permission::create(['name' => 'estados.edit',
                            'description' => 'Editar Estado'])->assignRole($rolAdministrador);;
        Permission::create(['name' => 'estados.destroy',
                            'description' => 'Elimnar Estado'])->assignRole($rolAdministrador);;

        //Permisos para el Modelo de PERSONAS
        Permission::create(['name' => 'personas.index',
                            'description' => 'Ver lista de Personas'])->assignRole($rolAdministrador);
        Permission::create(['name' => 'personas.create',
                            'description' => 'Crear Persona'])->assignRole($rolAdministrador);
        Permission::create(['name' => 'personas.show',
                            'description' => 'Ver Persona'])->assignRole($rolAdministrador);
        Permission::create(['name' => 'personas.edit',
                            'description' => 'Editar Persona'])->assignRole($rolAdministrador);
        Permission::create(['name' => 'personas.destroy',
                            'description' => 'Eliminar Persona'])->assignRole($rolAdministrador);

        //Permisos para el modelo de REGISTRO DE LLAMADAS
        Permission::create(['name' => 'registro-llamadas.index', 
                            'description' => 'Ver lista de Llamadas'])->syncRoles([$rolAdministrador, $rolAnalista]);
        Permission::create(['name' => 'registro-llamadas.create',
                            'description' => 'Registrar Llamada'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'registro-llamadas.show',
                            'description' => 'Ver Registro de Llamada'])->syncRoles([$rolAdministrador, $rolAnalista]);
        Permission::create(['name' => 'registro-llamadas.edit',
                            'description' => 'Editar Llamada'])->syncRoles($rolAdministrador);
        Permission::create(['name' => 'registro-llamadas.destroy',
                            'description' => 'Eliminar Registro de Llamada'])->syncRoles($rolAdministrador);
    }
}
