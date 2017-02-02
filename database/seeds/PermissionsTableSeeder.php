<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');

        $createInvoice = new Permission();
        $createInvoice->name         = 'create-invoice';
        $createInvoice->display_name = 'Create Invoices'; //optional
        $createInvoice->description  = 'Create new invoices'; //optional
        $createInvoice->save();

        $editInvoice = new Permission();
        $editInvoice->name         = 'edit-invoice';
        $editInvoice->display_name = 'Edit Invoices'; //optional
        $editInvoice->description  = 'Edit existing invoices'; //optional
        $editInvoice->save();

        $deleteInvoice = new Permission();
        $deleteInvoice->name         = 'delete-invoice';
        $deleteInvoice->display_name = 'Delete Invoices'; //optional
        $deleteInvoice->description  = 'Delete existing invoices'; //optional
        $deleteInvoice->save();


    }
}
