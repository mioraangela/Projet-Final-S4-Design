<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class MobileMoneySeeder extends Seeder
{
    public function run()
    {
        $this->db->table('prefixes')->insertBatch([
            ['prefixe' => '032'],
            ['prefixe' => '033'],
            ['prefixe' => '034'],
            ['prefixe' => '035'],
            ['prefixe' => '037'],
            ['prefixe' => '038'],
            ['prefixe' => '+26132'],
            ['prefixe' => '+26133'],
            ['prefixe' => '+26134'],
            ['prefixe' => '+26135'],
            ['prefixe' => '+26137'],
            ['prefixe' => '+26138'],
        ]);

        $this->db->table('clients')->insertBatch([
            ['telephone' => '0341234567', 'solde' => 50000],
            ['telephone' => '0387654321', 'solde' => 30000],
        ]);

        $this->db->table('types_operation')->insertBatch([
            ['nom' => 'Dépôt'],
            ['nom' => 'Retrait'],
            ['nom' => 'Transfert'],
        ]);

        $this->db->table('baremes_frais')->insertBatch([
            ['type_operation_id' => 1, 'montant_minimum' => 1,        'montant_maximum' => 5000,     'frais' => 0],
            ['type_operation_id' => 1, 'montant_minimum' => 5001,     'montant_maximum' => 10000,    'frais' => 0],
            ['type_operation_id' => 1, 'montant_minimum' => 10001,    'montant_maximum' => 50000,    'frais' => 0],
            ['type_operation_id' => 1, 'montant_minimum' => 50001,    'montant_maximum' => 100000,   'frais' => 0],
            ['type_operation_id' => 1, 'montant_minimum' => 100001,   'montant_maximum' => 500000,   'frais' => 0],
            ['type_operation_id' => 1, 'montant_minimum' => 500001,   'montant_maximum' => 1000000,  'frais' => 0],
            ['type_operation_id' => 1, 'montant_minimum' => 1000001,  'montant_maximum' => 2000000,  'frais' => 0],

            ['type_operation_id' => 2, 'montant_minimum' => 1,        'montant_maximum' => 5000,     'frais' => 150],
            ['type_operation_id' => 2, 'montant_minimum' => 5001,     'montant_maximum' => 10000,    'frais' => 300],
            ['type_operation_id' => 2, 'montant_minimum' => 10001,    'montant_maximum' => 50000,    'frais' => 800],
            ['type_operation_id' => 2, 'montant_minimum' => 50001,    'montant_maximum' => 100000,   'frais' => 1500],
            ['type_operation_id' => 2, 'montant_minimum' => 100001,   'montant_maximum' => 500000,   'frais' => 3000],
            ['type_operation_id' => 2, 'montant_minimum' => 500001,   'montant_maximum' => 1000000,  'frais' => 5000],
            ['type_operation_id' => 2, 'montant_minimum' => 1000001,  'montant_maximum' => 2000000,  'frais' => 8000],

            ['type_operation_id' => 3, 'montant_minimum' => 1,        'montant_maximum' => 5000,     'frais' => 100],
            ['type_operation_id' => 3, 'montant_minimum' => 5001,     'montant_maximum' => 10000,    'frais' => 200],
            ['type_operation_id' => 3, 'montant_minimum' => 10001,    'montant_maximum' => 50000,    'frais' => 500],
            ['type_operation_id' => 3, 'montant_minimum' => 50001,    'montant_maximum' => 100000,   'frais' => 1000],
            ['type_operation_id' => 3, 'montant_minimum' => 100001,   'montant_maximum' => 500000,   'frais' => 2000],
            ['type_operation_id' => 3, 'montant_minimum' => 500001,   'montant_maximum' => 1000000,  'frais' => 3500],
            ['type_operation_id' => 3, 'montant_minimum' => 1000001,  'montant_maximum' => 2000000,  'frais' => 5000],
        ]);

        $this->db->table('operations')->insertBatch([
            [
                'client_id' => 1,
                'type_operation_id' => 1,
                'destinataire' => null,
                'montant' => 20000,
                'frais' => 500,
                'date_operation' => '2026-07-20 10:00:00',
            ],
            [
                'client_id' => 2,
                'type_operation_id' => 3,
                'destinataire' => '0341234567',
                'montant' => 5000,
                'frais' => 1000,
                'date_operation' => '2026-07-20 11:00:00',
            ],
            [
                'client_id' => 1,
                'type_operation_id' => 2,
                'destinataire' => null,
                'montant' => 7000,
                'frais' => 200,
                'date_operation' => '2026-07-20 12:00:00',
            ],
        ]);
    }
}