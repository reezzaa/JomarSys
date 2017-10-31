<?php

use Illuminate\Database\Seeder;
use App\PaymentForm;
use App\Retention;
use App\Recoupment;
use App\Downpayment;
use App\Tax;
use App\EmployeeIDUtil;
use App\ClientIDUtil;
use App\ContractIDUtil;
use App\QuoteIDUtil;
use App\InvoiceIDUtil;
use App\DeliveryIDUtil;
use App\OrIDUtil;
class ThisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentForm::create([
                'strFormName' => 'Cash',
                'todelete' => 1,
                'status' => 1,
            ]);
        PaymentForm::create([
                'strFormName' => 'Cheque',
                'todelete' => 1,
                'status' => 1,
            ]);
        Downpayment::create([
                'intDownValue' => '30',
            ]);
        Recoupment::create([
                'intRecValue' => '30',
            ]);
        Retention::create([
                'intRetValue' => '10',
            ]);
        Tax::create([
                'intTaxValue' => '12',
            ]);
        EmployeeIDUtil::create([
                'strEmpIDUtil' => 'Emp0000000',
            ]);
        ClientIDUtil::create([
                'strClientIDUtil' => 'Client0000000',
            ]);
        QuoteIDUtil::create([
                'strQuoteIDUtil' => 'Quote0000000',
            ]);
        ContractIDUtil::create([
                'strContractIDUtil' => 'Contract0000000',
            ]);
        InvoiceIDUtil::create([
                'strInvoiceIDUtil' => 'Inv0000000',
            ]);
        DeliveryIDUtil::create([
                'strDeliveryIDUtil' => 'Del0000000',
            ]);
        OrIDUtil::create([
                'strOrIDUtil' => 'OR0000000',
            ]);

    }
}
