<?php

/**
 * Elephant Class 
 *
 * Animal type Elephant
 *
 * @author Erick T Cuevas
 */
class Elephant extends Animal
{
    protected $health_life_limit = 70.00;
    protected $can_walk_flag = 1;

    /**
     * This method updates Elephant's status 
     *
     */
    protected function updateStatus(){
        if ( $this->health >= $this->health_life_limit ){
            $this->can_walk_flag = 1;
            $this->status=AnimalStatus::STATUS_ALIVE;
        } else {
            $this->status= AnimalStatus::STATUS_DIED;
            if( ( $this->can_walk_flag ) && ( $this->health < $this-> health_life_limit ) ) {
                $this->can_walk_flag = 0;
                $this->status = AnimalStatus::STATUS_CAN_NOT_WALK;
            }
        }
    }
}