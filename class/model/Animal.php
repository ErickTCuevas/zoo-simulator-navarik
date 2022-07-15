<?php

/**
 * Animal Class 
 *
 * @author Erick T Cuevas
 */
class Animal
{
    protected $health = 100.00;
    protected $health_highest_limit = 100.00;
    protected $health_life_limit = 0.0;
    protected $health_died = 0.0;
    protected $status=AnimalStatus::STATUS_ALIVE;
   
    public function __construct(){
    }

    /**
     * This method returns the internal health of the animal. 
     * 
     */
    public function getHealth(){
      return $this->health;
    }

    /**
     * This method returns the status of the animal ( See. AnimalStatus class ) 
     * 
     */
    public function getStatus(){
      return  $this->status;
    }
   
    /**
     * This method updates the internal health of the animal.
     * 
     * The health it is modified by the specified percentage of their current health
     * 
     * @param  int  $chage_by_percentage
     *
     */
    public function updateHealth($chage_by_percentage){
      // TODO: If Animal died?
      $modify_health = ( $this->health * ($chage_by_percentage/100) );
      $this->health += $modify_health;
      if( $this->health > $this->health_highest_limit ){
        $this->health = $this->health_highest_limit;
      }
      if( $this->health < $this->health_died){
        $this->health = $this->health_died;
      }
      $this->updateStatus();
   }

    /**
     * This method updates the internal status of the animal.
     * 
     * The status is updated by the internal health and the animal's health limit
     *
     */
    protected function updateStatus(){
      if( $this->health < $this->health_life_limit ) $this->status=AnimalStatus::STATUS_DIED;
    }
}