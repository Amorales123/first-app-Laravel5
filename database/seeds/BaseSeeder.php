<?php
use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Database\Seeder;
use \Illuminate\Database\Eloquent\Collection;
abstract class BaseSeeder extends Seeder {
    
    protected static $pool = array();
    protected function createMultiple($total, array $customValues = array()){
                       
        for($i=1; $i<=$total; $i++){
            
            $this->create($customValues);
        }
    }
    abstract public function getModel();
    abstract public function getDummyData(Generator $faker, array $customValues = array() );
    
    protected function create(array $customValues = array()){
        $values = $this->getDummyData(Faker::create(), $customValues);
        /*
         * Sí utilizo valores personalizados la función
         * array_merge() sustituye los valores aleatorios
         * por los personalizados!
         */
        $values = array_merge($values, $customValues);
        return $this->addToPool($this->getModel()->create($values));
    }
    protected function createFrom($seeder,array $customValues = array() ){
        
        $seeder = new $seeder;
        return $seeder->create($customValues);
    }
    protected function getRandom($model){
        
        if ( ! $this->collectionExist($model)){
            throw new Exception("The $model Collection does not exist");
        }
        //Extraigo un item aleatorio previamente cargado!
        return static::$pool[$model]->random();
    }
    //Método el Cual almacena la colección de Items Cargados a la DB
    private function addToPool($entity){
        
        $reflection = new ReflectionClass($entity);
        //Obtengo el Nombre Corto de la clase(Sin el Namespace)
        $class = $reflection->getShortName();
        
        
        //Verifico si ya tengo una colección de la clase en cuestión
        if(! $this->collectionExist($class)){
            //Creo una colección de Eloquent
            static::$pool[$class] = new Collection();
        }
        //Agrego las Entidades registradas por el Seeder
        static::$pool[$class]->add($entity);
        return $entity;
    }
    //Verifica si Existe la Colleción Indicada
    private function collectionExist($model){
        return isset(static::$pool[$model]);
    }
}
