<?php

class TicketCommentTableSeeder extends BaseSeeder{
   /*
     * Reemplazo el valor inicial de la variable protegida
     * para que se ejecute en la función run()
     * de la clase padre
     */
    protected $total = 250;
    
    public function getDummyData(\Faker\Generator $faker, array $customValues = array()) {
        return [
            'comment'   =>  $faker->paragraph(),
            'link'      =>  $faker->randomElement(['','',$faker->url]),
            /*
             * Manéras de Generar Dependencias de llaves Foraneas
             * FORAIGN KEY
             * 1. rand(1,51) = eligirá numeros autoincrementables
             * 2. $this->createFrom('UserTableSeeder')->id
             *  Crear Método abstracto en la clase Padre
             * 3. $this->getRandom('User')->Id
             * Crear Método abstracto en la clase Padre
             */
            'user_id'   =>  $this->getRandom('User')->id,
            'ticket_id' =>  $this->getRandom('Ticket')->id
        ];
    }

    public function getModel() {
        return new TeachMe\Entities\TicketComments();
    }

//put your code here
}
