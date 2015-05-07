<?php

class TicketTableSeeder extends BaseSeeder{
    
    public function getDummyData(\Faker\Generator $faker, array $customValues = array()) {
        return[
            'tittle'     =>  $faker->sentence(),
            'status'    =>  $faker->randomElement(['open','open','closed']),
            /*
             * Manéras de Generar Dependencias de llaves Foraneas
             * FORAIGN KEY
             * 1. rand(1,51) = eligirá numeros autoincrementables
             * 2. $this->createFrom('UserTableSeeder')->id
             *  Crear Método abstracto en la clase Padre
             * 3. $this->getRandom('User')->Id
             * Crear Método abstracto en la clase Padre
             */
            //'user_id'   =>  $this->createFrom('UserTableSeeder')->id
            'user_id'   =>      $this->getRandom('User')->id
        ];
    }

    public function getModel() {
        return new TeachMe\Entities\Ticket();
    }
    public function run(){
        
        $this->createMultiple(50);
    }

}
