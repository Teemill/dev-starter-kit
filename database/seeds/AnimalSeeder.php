<?php

use Illuminate\Database\Seeder;
use App\Animal;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owl = new Animal;
        $owl->name = "Owl";
        $owl->class = "Bird";
        $owl->conservation_status = "NT";
        $owl->latin_name = "Strigiformes";
        $owl->save();

        $otter = new Animal;
        $otter->name = "Otter";
        $otter->class = "Mammal";
        $otter->conservation_status = "LC";
        $otter->latin_name = "Lutrinae";
        $otter->save();

        $aadvark = new Animal;
        $aadvark->name = "Aadvark";
        $aadvark->class = "Mammal";
        $aadvark->conservation_status = "LC";
        $aadvark->latin_name = "Orycteropus afer";
        $aadvark->save();

        $snake = new Animal;
        $snake->name = "Snake";
        $snake->class = "Reptile";
        $snake->conservation_status = "VU";
        $snake->latin_name = "Serpentes";
        $snake->save();

        $butterfly = new Animal;
        $butterfly->name = "Butterfly";
        $butterfly->class = "Insect";
        $butterfly->conservation_status = "LC";
        $butterfly->latin_name = "Rhopalocera";
        $butterfly->save();
    }
}
