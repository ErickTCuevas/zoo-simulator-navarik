<?php

/**
 * Data Class
 *
 * Serialize and unserialze data, enconding it with Base64
 * 
 * @author Erick T Cuevas
 */
class Data
{
    /**
     * This method unserialize data and decode it using  Base64.
     * 
     * @param string $request - contains the encoded data 
     * 
     * @return array contains the original data
     *
     */
    public function load($request){
        return unserialize( base64_decode($request) );
    }

    /**
     * This method serialize data and encode it using Base64.
     * 
     * @param array $data - contains the original data to serialize and encode 
     * 
     * @return string contains the encoded data
     *
     */
    public function save($data){
        return base64_encode( serialize( $data ) );
    }
}