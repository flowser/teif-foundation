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
                     //all eyes like SuperAdmin overall
                    Permission::create(['name' => 'View All']);
                    //organisation
                    Permission::create(['name' => 'Add Organisation']);
										Permission::create(['name' => 'Edit Organisation']);
										Permission::create(['name' => 'Delete Organisation']);
										Permission::create(['name' => 'Disable Organisation']);
                    //organisation Admin
                    Permission::create(['name' => 'Add Organisation Admin']);
                    Permission::create(['name' => 'View Organisation Admin']);
										Permission::create(['name' => 'Edit Organisation Admin']);
										Permission::create(['name' => 'Delete Organisation Admin']);
										Permission::create(['name' => 'Disable Organisation Admin']);
                    //Organisation accounts cashier
                    Permission::create(['name' => 'View Organisation Accounts']);
										Permission::create(['name' => 'Edit Organisation Accounts']);
                    //Organisation Reviews
                    Permission::create(['name' => 'View Organisation Reviews']);
										Permission::create(['name' => 'Approve Organisation Reviews']);
										//Organisation Requests
                    Permission::create(['name' => 'View Organisation Requests']);
										Permission::create(['name' => 'Approve Organisation Requests']);

                    //Bureaus
                    Permission::create(['name' => 'View All Bureaus']);
										Permission::create(['name' => 'Add Bureaus']);
										Permission::create(['name' => 'Edit All Bureaus']);
										Permission::create(['name' => 'Delete Bureaus']);
                    Permission::create(['name' => 'Disable Bureaus']);

                     //Bureau Superadmin
                     Permission::create(['name' => 'Add Bureau Superadmin']);
                     Permission::create(['name' => 'View Bureau Superadmin']);
                     Permission::create(['name' => 'Edit Bureau Superadmin']);
                     Permission::create(['name' => 'Delete Bureau Superadmin']);
                     Permission::create(['name' => 'Disable Bureau Superadmin']);
                     //Bureau Admin
                     Permission::create(['name' => 'Add Bureau Admin']);
                     Permission::create(['name' => 'View Bureau Admin']);
                     Permission::create(['name' => 'Edit Bureau Admin']);
                     Permission::create(['name' => 'Delete Bureau Admin']);
                     Permission::create(['name' => 'Disable Bureau Admin']);
                    //Bureau accounts cashier
                    Permission::create(['name' => 'View Bureau Accounts']);
										Permission::create(['name' => 'Edit Bureau Accounts']);
                     //Bureau Reviews
                    Permission::create(['name' => 'View Bureau Reviews']);
										Permission::create(['name' => 'Approve Bureau Reviews']);
										//Bureau Requests
                    Permission::create(['name' => 'View Bureau Requests']);
										Permission::create(['name' => 'Approve Bureau Requests']);

                    //Househelps bureaus
                    Permission::create(['name' => 'View All Houshelps']);
										Permission::create(['name' => 'Add Househelps']);
										Permission::create(['name' => 'Edit Househelps']);
                    Permission::create(['name' => 'Disable Househelps']);

                    //Househelp Feedbacks
                    Permission::create(['name' => 'View Househelp Reviews']);
										Permission::create(['name' => 'Edit Househelp Reviews']);
										Permission::create(['name' => 'Approve Househelp Reviews']);
                     //Househelp Reviews
                    Permission::create(['name' => 'View Househelp Requests']);
										Permission::create(['name' => 'Approve Househelp Requests']);

                    //clients
                    Permission::create(['name' => 'View All Clients']);
										Permission::create(['name' => 'Edit Clients']);
										Permission::create(['name' => 'Disable Clients']);
                    //Accept clients Search Order to Hire
                    Permission::create(['name' => 'View All Clients Search Orders']);
										Permission::create(['name' => 'Edit Clients Search Orders']);
										Permission::create(['name' => 'Approve Clients Search Orders']);
										//Client Reviews
                    Permission::create(['name' => 'View Client Reviews']);
										Permission::create(['name' => 'Approve Client Reviews']);
                    //Client Reviews
                    Permission::create(['name' => 'View Client Requests']);
                    Permission::create(['name' => 'Approve Client Requests']);

                    //Househelp themselves and Clients
                    Permission::create(['name' => 'View Frontend']);
                    Permission::create(['name' => 'View']);
                    Permission::create(['name' => 'Edit']);




                      // Create Roles
        $superadmin = Role::create(['name' => 'Organisation Superadmin']);
        $orgdirector = Role::create(['name' => 'Organisation Director']);
        $orgemployee = Role::create(['name' => 'Organisation Employee']);
        $orgadmin = Role::create(['name' => 'Organisation Admin']);
        $orgaccountant = Role::create(['name' => 'Organisation Accountant']);

        $bureaudirector = Role::create(['name' => 'Bureau Director']);
        $bureauemployee = Role::create(['name' => 'Bureau Employee']);
        $bureauadmin = Role::create(['name' => 'Bureau Admin']);
        $bureauaccountant = Role::create(['name' => 'Bureau Accountant']);
        $househelp = Role::create(['name' => 'Househelp']);
        $househelpkin = Role::create(['name' => 'Househelp Kin']);


        $client = Role::create(['name' => 'Client']);


        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $superadmin->givePermissionTo(
                   'View Backend', 'View All',
                    //own profile
                   'View', 'Edit',
                   'Add Organisation', 'Edit Organisation', 'Delete Organisation', 'Disable Organisation',
                   'Add Organisation Admin','View Organisation Admin','Edit Organisation Admin','Delete Organisation Admin','Disable Organisation Admin'
               );
               //Director
        $orgdirector->givePermissionTo(
                   'View Backend', 'View All',
                    //own profile
                   'View', 'Edit',
                   'Add Organisation', 'Edit Organisation', 'Delete Organisation', 'Disable Organisation',
                   'Add Organisation Admin','View Organisation Admin','Edit Organisation Admin','Delete Organisation Admin','Disable Organisation Admin'
               );
        $orgadmin->givePermissionTo(
                    'View Backend',
                     //own profile
                   'View', 'Edit',
                    'View Organisation Accounts',	'Edit Organisation Accounts',
                    //Organisation Reviews
                    'View Organisation Reviews',	'Approve Organisation Reviews',
                    //Organisation Requests
                    'View Organisation Requests', 'Approve Organisation Requests'
                  );
        $orgemployee->givePermissionTo(
                    'View Backend',
                     //own profile
                   'View', 'Edit',
                    'View Organisation Accounts',	'Edit Organisation Accounts',
                    //Organisation Reviews
                    'View Organisation Reviews',	'Approve Organisation Reviews',
                    //Organisation Requests
                    'View Organisation Requests', 'Approve Organisation Requests'
                  );

                  //organisation Accountant
        $orgaccountant->givePermissionTo(
                    'View Backend',
                     //own profile
                   'View', 'Edit',
                    'View Organisation Accounts',	'Edit Organisation Accounts'
                  );

               //DBureau irector
        $bureaudirector->givePermissionTo(
                   'View Backend', 'View All',
                    //own profile
                   'View', 'Edit',
                   'Add Organisation', 'Edit Organisation', 'Delete Organisation', 'Disable Organisation',
                   'Add Organisation Admin','View Organisation Admin','Edit Organisation Admin','Delete Organisation Admin','Disable Organisation Admin'
               );
        $bureauadmin->givePermissionTo(
                    'View Backend',
                     //own profile
                   'View', 'Edit',
                    'View Organisation Accounts',	'Edit Organisation Accounts',
                    //Organisation Reviews
                    'View Organisation Reviews',	'Approve Organisation Reviews',
                    //Organisation Requests
                    'View Organisation Requests', 'Approve Organisation Requests'
                  );
        $bureauemployee->givePermissionTo(
                    'View Backend',
                     //own profile
                   'View', 'Edit',
                    'View Organisation Accounts',	'Edit Organisation Accounts',
                    //Organisation Reviews
                    'View Organisation Reviews',	'Approve Organisation Reviews',
                    //Organisation Requests
                    'View Organisation Requests', 'Approve Organisation Requests'
                  );

                  //organisation Accountant
        $bureauaccountant->givePermissionTo(
                    'View Backend',
                     //own profile
                   'View', 'Edit',
                    'View Organisation Accounts',	'Edit Organisation Accounts'
                  );

                  //bureau Superadmin

        $househelp->givePermissionTo('View Backend','View Frontend', 'View', 'Edit');
        $househelpkin->givePermissionTo('View Frontend', 'View', 'Edit');
        $client->givePermissionTo('View Frontend', 'View', 'Edit');

        $this->enableForeignKeys();
    }
}
