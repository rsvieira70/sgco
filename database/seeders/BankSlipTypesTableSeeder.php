<?php

namespace Database\Seeders;

use App\Models\BankSlipType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSlipTypesTableSeeder extends Seeder
{
    public function run()
    {
        BankSlipType::create(['description'  => 'Instalação', 'issue_invoice' => true,]);
        BankSlipType::create(['description'  => 'Orçamento clinico', 'pay_commission' => true, 'issue_invoice' => true,]);
        BankSlipType::create(['description'  => 'Manutenção ortodontica', 'pay_commission' => true, 'issue_invoice' => true, 'pay_receipt' => true,]);
        BankSlipType::create(['description'  => 'Negociação', 'issue_invoice' => true, 'used_financial_agreement' => true,]);
        BankSlipType::create(['description'  => 'Bracket', 'issue_invoice' => true,]);
        BankSlipType::create(['description'  => 'Banda', 'issue_invoice' => true,]);
        BankSlipType::create(['description'  => 'Taxa de recibo',]);
    }
}
