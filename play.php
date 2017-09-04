<?php

require "vendor/autoload.php";

use Pho\Kernel\Kernel;
use PhoNetworksAutogenerated\User;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$configs = array(
  "services"=>array(
   		"database" => getenv('DATABASE_URI'),
    	"storage" => getenv("STORAGE_URI"),
  ),
  "default_objects" => array(
  		"graph" => class_exists(\PhoNetworksAutogenerated\Twitter::class) ? \PhoNetworksAutogenerated\Twitter::class : ( class_exists(\PhoNetworksAutogenerated\Facebook::class) ? \PhoNetworksAutogenerated\Facebook::class : \PhoNetworksAutogenerated\Graph::class ),
  		"founder" => User::class,
  		"actor" => User::class,
  )
);

$kernel = new \Pho\Kernel\Kernel($configs);
$founder = new \PhoNetworksAutogenerated\User($kernel, $kernel->space(), "123456");
$kernel->boot($founder);

$founder = $kernel->founder();
$graph = $kernel->graph();
