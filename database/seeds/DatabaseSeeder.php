<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $user = User::create(['name' => 'Gad', 'last_name' => 'Arenas', 
                'phone' => '5573348266', 'email' => 'garenas.1991@gmail.com', 'password' => 'Sysware2016']);
        
        $roleSuperAdmin = Role::create(['name' => 'Super Administrador', 'user_create' => $user->id]);
        $roleAdmin = Role::create(['name' => 'Administrador', 'user_create' => $user->id]);
        $roleMonitoreo = Role::create(['name' => 'Monitoreo', 'user_create' => $user->id]);
        Role::create(['name' => 'Conductor', 'user_create' => $user->id]);
        
        $permission = Permission::create(['name' => 'user.read', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        $roleMonitoreo->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'user.actions', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'role.read', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'role.actions', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'permission.read', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'permission.actions', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'line.read', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        $roleMonitoreo->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'line.actions', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'origin.read', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        $roleMonitoreo->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'origin.actions', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'remission.read', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        $roleMonitoreo->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'remission.actions', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'product.read', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        $roleMonitoreo->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'product.actions', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'incident.read', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        $roleMonitoreo->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'incident.actions', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'product_type.read', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'product_type.actions', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'incident_type.read', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'incident_type.actions', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'vehicle.read', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        $roleMonitoreo->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'vehicle.actions', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'vehicle_status.read', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'vehicle_status.actions', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'tracking.read', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        $roleMonitoreo->givePermissionTo($permission);
        
        $permission = Permission::create(['name' => 'tracking.actions', 'user_create' => $user->id]);
        $roleSuperAdmin->givePermissionTo($permission);
        $roleAdmin->givePermissionTo($permission);
        
        $user->assignRole($roleSuperAdmin);
    }
}
