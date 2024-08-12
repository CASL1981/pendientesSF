<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::create([
            'costcenter' => '1',
            'name' => 'Oficina principal',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1',
        ]);

        Destination::create([
            'costcenter' => '1000',
            'name' => 'Farmacia Pueblo Nuevo',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1000',
        ]);
        Destination::create([
            'costcenter' => '1100',
            'name' => 'farmacia Valencia',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1100',
        ]);
        Destination::create([
            'costcenter' => '1300',
            'name' => 'Farmacia Montelibano',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1300',
        ]);

        Destination::create([
            'costcenter' => '1401',
            'name' => 'Farmacia Amparo',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1400',
        ]);

        Destination::create([
            'costcenter' => '1402',
            'name' => 'Farmacia Canta Claro',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1400',
        ]);

        Destination::create([
            'costcenter' => '1403',
            'name' => 'Farmacia Camilo Torres',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1400',
        ]);

        Destination::create([
            'costcenter' => '1404',
            'name' => 'Farmacia Mogambo',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1400',
        ]);

        Destination::create([
            'costcenter' => '1405',
            'name' => 'Farmacia La Gloria',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1400',
        ]);

        Destination::create([
            'costcenter' => '1406',
            'name' => 'Farmacia La Granja',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1400',
        ]);

        Destination::create([
            'costcenter' => '1407',
            'name' => 'Farmacia Villa Cielo',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1400',
        ]);

        Destination::create([
            'costcenter' => '1408',
            'name' => 'Farmacia San Anterito',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1400',
        ]);

        Destination::create([
            'costcenter' => '1409',
            'name' => 'Farmacia Betanci',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1400',
        ]);

        Destination::create([
            'costcenter' => '1500',
            'name' => 'Farmacia Planeta Rica',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1500',
        ]);

        Destination::create([
            'costcenter' => '1600',
            'name' => 'Farmacia San Antero',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1600',
        ]);

        Destination::create([
            'costcenter' => '1800',
            'name' => 'Farmacia La Apartada',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1800',
        ]);

        Destination::create([
            'costcenter' => '1900',
            'name' => 'Farmacia Puerto Escondido',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '1900',
        ]);

        Destination::create([
            'costcenter' => '2000',
            'name' => 'Farmacia Puerto Libertador',
            'address' => 'Calle 28A # 23 06 BRR San Jose',
            'phone' => '6017171717',
            'location' => '2000',
        ]);
    }
}