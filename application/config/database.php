<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$active_group = 'default';
$query_builder = TRUE;
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    // Local Development Configuration
    $db['default'] = array(
        'dsn'      => '',
        'hostname' => 'localhost:2023', 
        'username' => 'root',     
        'password' => 'root',     
        'database' => 'indiaskills',
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => FALSE,
        'db_debug' => TRUE,
        'cache_on' => FALSE,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'encrypt'  => FALSE,
        'compress' => FALSE,
        'stricton' => FALSE,
        'failover' => array(),
        'save_queries' => TRUE
    );
} else {
    // Live/Production Configuration
    $db['default'] = array(
        'dsn'      => '',
        'hostname' => 'localhost', 
        'username' => 'vimarshtcoe_user',        
        'password' => '3s1G2&Peo=1Y',   
        'database' => 'vimarshtcoe_database',       
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => FALSE,
        'db_debug' => FALSE, 
        'cache_on' => FALSE,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'encrypt'  => FALSE,
        'compress' => FALSE,
        'stricton' => FALSE,
        'failover' => array(),
        'save_queries' => FALSE 
    );
}
