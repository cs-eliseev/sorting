<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use sort\Terminal;
use Symfony\Component\Console\Application;

$app = new Application('Merge sorting', 'v1.0.0');
$app->addCommands([new Terminal()]);
$app->run();