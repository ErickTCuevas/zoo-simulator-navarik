<?php

/**
 * Zoo Class 
 *
 *  - Feed the animals in the zoo ( increase animal's health )
 *  - Initialize the zoo ( create animals based on the internal variable $init_zoo_animals )
 *  - Provoke pass time in the zoo ( Decrease animal's health and increase zoo's time )
 *
 * @author Erick T Cuevas
 */
class Zoo
{
    protected $animals = array();
    protected $current_time = 0;
    protected $init_zoo_animals = ['Elephant' => 5, 'Giraffe' => 5, 'Monkey' => 5];
    protected $feed_health_min = 10;
    protected $feed_health_max = 25;
    protected $time_pass_health_min = 0;
    protected $time_pass_health_max = 20;
    protected $time_pass_hour_rate = 1;

    /**
     * This method feeds the zoo's animals.
     * 
     * Generates a random value between $feed_health_min and $feed_health_max for each type of animal
     * The health of the respective animals is increased by the specified percentage of their current health.
     * Health is capped to the animal's $health_highest_limit ( See. model/Animal class)
     * 
     * @param string $request - contains the encoded data 
     * 
     * @return string $data_payload - contains the updated data
     *
     */
    public function feedAnimals($request){
        // Load zoo animals' data and current time
        $data = new Data();
        $data_payload = $data->load($request);
        $this->animals = $data_payload['animals'];
        $this->current_time = $data_payload['current_time'];
        // Feed Animals
        foreach( $this->animals as $animal_type => $animal_array ){
            $number_of_animals = count($animal_array);
            $increase_health_by = RandomGenerator::generate($this->feed_health_min,$this->feed_health_max);
            for( $index = 0; $index < $number_of_animals; $index++ ){
                // Prevent updating health if the animal is already dead
                if($this->animals["$animal_type"][$index]->getStatus() == AnimalStatus::STATUS_DIED ){
                    continue;
                }
                // Increase health by percentage
                $this->animals["$animal_type"][$index]->updateHealth($increase_health_by);
            }
        }
        // Save zoo animals' data and current time
        $data_payload = array();
        $data_payload['animals'] = $this->animals;
        $data_payload['current_time'] = $this->current_time; 
        $data = new Data();
        $data_payload['rendered_data'] = $data->save($data_payload);
        return $data_payload;       
    }

    /**
     * This method initialize the zoo 
     * 
     * Creates animals based on the internal variable $init_zoo_animals 
     * 
     * @return string $data_payload - contains the updated data
     *
     */
    public function init(){
        foreach( $this->init_zoo_animals as $animal => $create_animals ){
            $temp_array= array();
            for( $i=0; $i<$create_animals; $i++){
                $temp_array[] = new $animal();
            }
            $this->animals["$animal"] = $temp_array;
        }
        // Save zoo animals' data and current time
        $data_payload = array();
        $data_payload['animals'] = $this->animals;
        $data_payload['current_time'] = $this->current_time; 
        $data = new Data();
        $data_payload['rendered_data'] = $data->save($data_payload);
        return $data_payload;  
    }

    /**
     * This method provokes to pass time in the zoo and reduces Animal's health
     * 
     * Generates a random value between $time_pass_health_min and $time_pass_health_max for each animal
     * The health of the respective animals is decreased  by the specified percentage of their current health.
     * Increases the zoo's current time by $time_pass_hour_rate
     * 
     * @param string $request - contains the encoded data 
     * 
     * @return string $data_payload - contains the updated data
     *
     */
    public function passTime($request){
        // Load zoo animals' data and current time
        $data = new Data();
        $data_payload = $data->load($request);
        $this->animals = $data_payload['animals'];
        $this->current_time = $data_payload['current_time'];
        // Increment current time
        $this->current_time += $this->time_pass_hour_rate;
        // Reduce animals' health
        foreach( $this->animals as $animal_type => $animal_array ){
            $number_of_animals = count($animal_array);
            for( $index = 0; $index < $number_of_animals; $index++ ){
                // Prevent updating health if the animal is already dead
                if($this->animals["$animal_type"][$index]->getStatus() == AnimalStatus::STATUS_DIED ){
                    continue;
                }
                // Decrease health by percentage
                $decrease_health_by = -1 * RandomGenerator::generate($this->time_pass_health_min,$this->time_pass_health_max);
                $this->animals["$animal_type"][$index]->updateHealth($decrease_health_by);
            }
        }
        // Save zoo animals' data and current time
        $data_payload = array();
        $data_payload['animals'] = $this->animals;
        $data_payload['current_time'] = $this->current_time; 
        $data = new Data();
        $data_payload['rendered_data'] = $data->save($data_payload);
        return $data_payload;  
    }
}