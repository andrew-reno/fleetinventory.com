<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Spacecraft;



class SpacecraftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         for ($i = 0; $i < 10; $i++) {
            Spacecraft::create([    
            	'name' 		=> $i != 1 ? 'Devastator '.$i : 'Red Five',
                'class'   	=> 'Star Destroyer',
                'crew'		=> 35000,
                'image'		=> 'https:\\url.to.image',
                'value'		=> 1999.99,
                'status'	=> $i != 1 ? 'Operational' : 'Damaged',
                'armament'	=> json_encode( array(
        								  array('title' => 'Turbo Laser', 'qty' => '60'), 
        								  array('title' => 'Ion Cannons', 'qty' => '60') ,
        								  array('title' => 'Tractor Beam', 'qty' => '60') 
                						))
 			]);
    	}
	}
}
