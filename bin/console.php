<?php

$autoloader = require __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();


// Create the Application
$application = new Symfony\Component\Console\Application;

$application->add(new \SalmaAbdelhady\RoomsXML\Command\WorkFlow());

// Run it
$application->run();