<?php

namespace Database\Seeders;

use App\Models\Permissions;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'user_type' => 'Admin',
            'name' => 'Admin',
            'phone_no' => 123456789,
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
        ],);

        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $stateManager = User::create(
            [
                'user_type' => 'StateManager',
                'name' => 'StateManager',
                'phone_no' => 123456789,
                'email' => 'statemanager@gmail.com',
                'password' => Hash::make('123456'),
            ],
        );

        $role = Role::create(['name' => 'StateManager']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $stateManager->assignRole([$role->id]);

        $contentManager = User::create(
            [
                'user_type' => 'ContentWriter',
                'name' => 'ContentWriter',
                'phone_no' => 123456789,
                'email' => 'contentwriter@gmail.com',
                'password' => Hash::make('123456'),
            ],
        );

        $role = Role::create(['name' => 'ContentWriter']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $contentManager->assignRole([$role->id]);

        $bde = User::create(
            [
                'user_type' => 'bde',
                'name' => 'bde',
                'phone_no' => 123456789,
                'email' => 'bde@gmail.com',
                'password' => Hash::make('123456'),
            ],
        );
        $role = Role::create(['name' => 'bde']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $bde->assignRole([$role->id]);

        $franchise = User::create(
            [
                'user_type' => 'Franchise',
                'name' => 'Franchise',
                'phone_no' => 123456789,
                'email' => 'franchise@gmail.com',
                'password' => Hash::make('123456'),
            ],
        );
        $role = Role::create(['name' => 'Franchise']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $franchise->assignRole([$role->id]);

        $editor = User::create(
            [
                'user_type' => 'Editor',
                'name' => 'Editor',
                'phone_no' => 123456789,
                'email' => 'editor@gmail.com',
                'password' => Hash::make('123456'),
            ],
        );
        $role = Role::create(['name' => 'Editor']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $editor->assignRole([$role->id]);

        $telecaller = User::create(
            [
                'user_type' => 'Telecaller',
                'name' => 'Telecaller',
                'phone_no' => 123456789,
                'email' => 'telecaller@gmail.com',
                'password' => Hash::make('123456'),
            ],
        );
        $role = Role::create(['name' => 'Telecaller']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $telecaller->assignRole([$role->id]);

        $customerCare = User::create(
            [
                'user_type' => 'CustomerCare',
                'name' => 'CustomerCare',
                'phone_no' => 123456789,
                'email' => 'customercare@gmail.com',
                'password' => Hash::make('123456'),
            ],
        );
        $role = Role::create(['name' => 'CustomerCare']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $customerCare->assignRole([$role->id]);
    }
}
