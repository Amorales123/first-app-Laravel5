<?php

use Faker\Generator;
use TeachMe\Entities\User;

class UserTableSeeder extends BaseSeeder {

    public function getDummyData(Generator $faker,array $customValues = array()) {
        return [
            'name'      =>  $faker->name,
            'email'     =>  $faker->email,
            'password'  => bcrypt('secret')
        ];
    }

    public function getModel() {
        return new User();
    }
    public function run()
    {
        $this->createAdmin();
        $this->createMultiple(50);
        
    }
    private function createAdmin(){
        
        $this->create([
            'name'      =>  'Angel Morales',
            'email'     =>  'angel@agel.com',
            'password'  => bcrypt('admin')
        ]);
    }
}
