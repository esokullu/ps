<?php

require "vendor/autoload.php";

use Pho\Kernel\Kernel;
use PhoNetworksAutogenerated\User;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$configs = array(
  "services"=>array(
   		"database" => ["type" => getenv('DATABASE_TYPE'), "uri" => getenv('DATABASE_URI')],
      "storage" => ["type" => getenv('STORAGE_TYPE'), "uri" =>  getenv("STORAGE_URI")],
      "index" => ["type" => getenv('INDEX_TYPE'), "uri" => getenv('INDEX_URI')]
  ),
  "default_objects" => array(
  		"graph" => \PhoNetworksAutogenerated\Site::class,
  		"founder" => User::class,
  		"actor" => User::class
  )
);

$kernel = new \Pho\Kernel\Kernel($configs);
$founder = new \PhoNetworksAutogenerated\User($kernel, $kernel->space(), "123456");
$kernel->boot($founder);

$founder = $kernel->founder();
$graph = $kernel->graph();
