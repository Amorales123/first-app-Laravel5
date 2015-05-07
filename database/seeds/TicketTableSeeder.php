<?php

class TicketTableSeeder extends BaseSeeder{
    
    public function getDummyData(\Faker\Generator $faker, array $customValues = array()) {
        return[
            'tittle'     =>  $faker->sentence(),
            'status'    =>  $faker->randomElement(['open','open','close']),
            'user_id'   =>  1
        ];
    }

    public function getModel() {
        return new TeachMe\Entities\Ticket();
    }
    public function run(){
        
        $this->createMultiple(50);
    }

}
