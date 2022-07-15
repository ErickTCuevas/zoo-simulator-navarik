<?php

/**
 * RandomGenerator Class 
 *
 * Generates a random number
 *
 * @author Erick T Cuevas
 */
class RandomGenerator
{
    /**
     * This method generates a random number between $min and $max
     * 
     * @param int $min - minimun number to generate
     * @param int $max - max number to generate
     *
     */
    public static function generate($min, $max){
        return rand($min,$max);
    }
}
