<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = ['state','district','city','state-manager-commission','content-writer-commission','franchise-commission','bde-commission','ad-packages','franchises','enquires','franchises-emp',
            'state-managers','content-writers','customer-care','bde'];
        foreach ($permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }

    }
}
