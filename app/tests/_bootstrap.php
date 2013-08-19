<?php
// This is global bootstrap for autoloading 

use Woodling\Woodling;

Woodling::getCore()->finder->addPaths('app/tests/_data/blueprints');

Woodling::getCore()->finder->findBlueprints();