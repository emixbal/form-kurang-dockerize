<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $transaction_types = [
            [
                'id'    => 11,
                'name'  => "bulk_topup",
                'description'  => "bernilai positif, type transaksi saat melakukan topup",
            ],
            [
                'id'    => 12,
                'name'  => "individual_topup",
                'description'  => "bernilai positif, type transaksi saat melakukan topup",
            ],
            [
                'id'    => 21,
                'name'  => "reedem",
                'description'  => "bernilai negatif, type transaksi saat anggota menggukan voucher",
            ],
        ];
        DB::table('transaction_types')->insert($transaction_types);
    }
}
