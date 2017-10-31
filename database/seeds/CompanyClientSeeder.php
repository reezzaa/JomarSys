<?php

use Illuminate\Database\Seeder;
use App\Client;
use App\CompanyClient;
class CompanyClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
                'strClientID' => 'CLNT-000-000-001',
                'strClientType' => 'Contractual',
                'todelete' => 1,
                'status' => 1,
            ]);
        CompanyClient::create([
                'strCompClientID' => 'CLNT-000-000-001',
                'strCompClientImage' => '',
                'strCompClientName' => 'Petron',
                'strCompClientRepresentative' => 'Janice de Belen',
                'strCompClientPosition' => 'Representative for Engineering',
                'strCompClientTIN' => '090-090-090-122',
                'strCompClientContactNo' => '09196162043',
                'strCompClientEmail' => 'petron@gmail.com',
                'strCompClientAddress' => 'Mabuhay Hills',
                'strCompClientCity' => 'Quezon',
                'strCompClientProv' => 'NCR',
            ]);
    }
}
