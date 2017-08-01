<?php

use App\Startup;
use Illuminate\Database\Seeder;

class AllTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Seed Startups
        $this->StartupsSeeder();


        

    }

    public function StartupsSeeder()
    {
        
        //Seed Startups
        $startupsStr = file_get_contents('database/data/startups.json');
        $startupsArr = json_decode($startupsStr, true);  
        
        foreach ($startupsArr as $startup) {
            
            Startup::create([
                'name'=>$startup['name'],
                'logo_path'=>$startup['logo'],
                'about'=>$startup['about'],
                'web_link'=>$startup['website']

            ]);


        } 


    }
}
