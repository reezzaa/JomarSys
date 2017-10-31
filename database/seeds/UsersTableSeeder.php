<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Userlevel;
use App\UserAccess;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
                'role_id'=>1,
                'active'=>1,
                'fname' => 'John',
                'mname' => 'Peñaredondo',
                'lname' => 'Sese',
                'username' => 'admin',
                'email' => 'johnsese@email.com',
                'password' => bcrypt('admin'),
                'remember_token' => str_random(10),
                'active' => 1,
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Utilities',
            'strUserLRoute'=>'utilities',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'1',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Worker Specialization',
            'strUserLRoute'=>'specialization',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'2',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Worker',
            'strUserLRoute'=>'worker',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'3',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Group UOM',
            'strUserLRoute'=>'groupuomeasure',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'4',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Detail UOM',
            'strUserLRoute'=>'detailuomeasure',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'5',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Material Type',
            'strUserLRoute'=>'materialtype',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'6',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Material Classification',
            'strUserLRoute'=>'materialclass',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'7',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Material',
            'strUserLRoute'=>'material',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'8',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Equipment Type',
            'strUserLRoute'=>'equiptype',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'9',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Equipment',
            'strUserLRoute'=>'equipment',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'10',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Service Offered',
            'strUserLRoute'=>'serviceOff',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'11',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Delivery Truck',
            'strUserLRoute'=>'deliverytruck',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'12',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Client',
            'strUserLRoute'=>'client',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'13',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Company Client',
            'strUserLRoute'=>'newcompclient',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'14',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Individual Client',
            'strUserLRoute'=>'newindclient',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'15',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Quotation',
            'strUserLRoute'=>'quote',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'16',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Quotation List',
            'strUserLRoute'=>'quotelist',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'17',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Add Contract',
            'strUserLRoute'=>'contractadd',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'18',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Contract List',
            'strUserLRoute'=>'contractlist',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'19',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Billing and Collection',
            'strUserLRoute'=>'billing',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'20',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Stock Adjustment',
            'strUserLRoute'=>'stockadjustment',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'21',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Progress Monitoring',
            'strUserLRoute'=>'progressmonitoring',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'22',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Delivery',
            'strUserLRoute'=>'delivery',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'23',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'User Level',
            'strUserLRoute'=>'userlevel',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'24',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Client Queries',
            'strUserLRoute'=>'clientqueries',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'25',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Stock Queries',
            'strUserLRoute'=>'clientqueries',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'26',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Delivery Queries',
            'strUserLRoute'=>'deliveryqueries',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'27',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Invoice Queries',
            'strUserLRoute'=>'invoicequeries',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'28',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Progress Report',
            'strUserLRoute'=>'progressreport',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'29',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Delivery Report',
            'strUserLRoute'=>'delivery_report',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'30',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Statement of Account Report',
            'strUserLRoute'=>'soareport',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'31',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'Collection Report',
            'strUserLRoute'=>'collectionreport',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'32',
            'is_active'=>'1',
            ]);
        Userlevel::create([
            'strUserLDesc'=>'References of Billing Report',
            'strUserLRoute'=>'referencesreport',
            ]);
        UserAccess::create([
            'users_id'=>'1',
            'userlevel_id'=>'33',
            'is_active'=>'1',
            ]);
    }
}
