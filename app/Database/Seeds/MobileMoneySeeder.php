<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class MobileMoneySeeder extends Seeder
{
    public function run()
    {
        $this->db->table('prefixes')->insertBatch([
            ['prefixe' => '032', 'operateur' => 'orange'],
            ['prefixe' => '033', 'operateur' => 'airtel'],
            ['prefixe' => '034', 'operateur' => 'yas'],
            ['prefixe' => '035', 'operateur' => 'airtel'],
            ['prefixe' => '037', 'operateur' => 'orange'],
            ['prefixe' => '038', 'operateur' => 'yas'],
            ['prefixe' => '+26132', 'operateur' => 'orange'],
            ['prefixe' => '+26133', 'operateur' => 'airtel'],
            ['prefixe' => '+26134', 'operateur' => 'yas'],
            ['prefixe' => '+26135', 'operateur' => 'airtel'],
            ['prefixe' => '+26137', 'operateur' => 'orange'],
            ['prefixe' => '+26138', 'operateur' => 'yas'],
        ]);

        $this->db->table('clients')->insertBatch([
            ['telephone' => '0341234567', 'solde' => 50000, 'solde_epargne' => 10000],
            ['telephone' => '0387654321', 'solde' => 30000, 'solde_epargne' => 5000],
            ['telephone' => '0329876543', 'solde' => 20000, 'solde_epargne' => 2000],
            ['telephone' => '0334567890', 'solde' => 10000, 'solde_epargne' => 1000],
        ]);

        $this->db->table('types_operation')->insertBatch([
            ['nom' => 'Dépôt'],
            ['nom' => 'Retrait'],
            ['nom' => 'Transfert'],
            ['nom' => 'Epargne'],
        ]);

        $baremes = [
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

            ['type_operation_id' => 3, 'montant_minimum' => 1,        'montant_maximum' => 5000,     'frais' => 100, 'commission_autre_operateur' => 1],
            ['type_operation_id' => 3, 'montant_minimum' => 5001,     'montant_maximum' => 10000,    'frais' => 200, 'commission_autre_operateur' => 2],
            ['type_operation_id' => 3, 'montant_minimum' => 10001,    'montant_maximum' => 50000,    'frais' => 500, 'commission_autre_operateur' => 2],
            ['type_operation_id' => 3, 'montant_minimum' => 50001,    'montant_maximum' => 100000,   'frais' => 1000, 'commission_autre_operateur' => 2.5],
            ['type_operation_id' => 3, 'montant_minimum' => 100001,   'montant_maximum' => 500000,   'frais' => 2000, 'commission_autre_operateur' => 3],
            ['type_operation_id' => 3, 'montant_minimum' => 500001,   'montant_maximum' => 1000000,  'frais' => 3500, 'commission_autre_operateur' => 3],
            ['type_operation_id' => 3, 'montant_minimum' => 1000001,  'montant_maximum' => 2000000,  'frais' => 5000, 'commission_autre_operateur' => 3],
        ];

        $baremesAInserer = [];
        foreach (['yas', 'orange', 'airtel'] as $operateur) {
            foreach ($baremes as $bareme) {
                if (!isset($bareme['commission_autre_operateur'])) {
                    $bareme['commission_autre_operateur'] = 0;
                }
                if (!isset($bareme['promotion'])) {
                    $bareme['promotion'] = 0;
                }
                $bareme['operateur'] = $operateur;
                $baremesAInserer[] = $bareme;
            }
        }
        $this->db->table('baremes_frais')->insertBatch($baremesAInserer);

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