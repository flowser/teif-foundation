<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

            Permission::create(['name' => 'View Backend']);
            Permission::create(['name' => 'View Frontend']);
            Permission::create(['name' => 'View All']);
            Permission::create(['name' => 'Add']);
		    Permission::create(['name' => 'Edit']);
		    Permission::create(['name' => 'Delete']);
		    Permission::create(['name' => 'Disable']);





                      // Create Roles
        $superadmin    = Role::create(['name' => 'Superadmin']);
        $orgdirector   = Role::create(['name' => 'Director']);
        $orgemployee   = Role::create(['name' => 'Employee']);
        $orgadmin      = Role::create(['name' => 'Admin']);
        $orgaccountant = Role::create(['name' => 'Accountant']);
        $tutor         = Role::create(['name' => 'Tutor']);
        $affiliate     = Role::create(['name' => 'Affiliate']);
        $client        = Role::create(['name' => 'Client']);


        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $superadmin->givePermissionTo(
                   'View Backend',
                   'View All',
                    'Edit',
                   'Add', 'Delete', 'Disable'
               );
               //Director
        $orgdirector->givePermissionTo(
                    'View Backend',
                    'View All',
                     'Edit',
                    'Add', 'Delete', 'Disable'
               );
        $orgadmin->givePermissionTo(
                    'View Backend',
                    'View All',
                     'Edit',
                    'Add', 'Delete', 'Disable'
                  );
        $orgemployee->givePermissionTo(
                    'View Backend',
                     'Edit',
                     'Delete'
                  );
        $orgaccountant->givePermissionTo(
                    'View Backend',
                    'View All',
                     'Edit',
                    'Delete', 'Disable'
                  );
        $tutor->givePermissionTo(
                    'View Frontend',
                     'Edit'
                 );
        $affiliate->givePermissionTo(
                    'View Frontend',
                     'Edit'
                 );
        $client->givePermissionTo(
                    'View Frontend',
                     'Edit'
                 );

        $this->enableForeignKeys();
    }
}
