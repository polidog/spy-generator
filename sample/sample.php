<?php

declare(strict_types=1);

require '../vendor/autoload.php';

use Polidog\UnitTestGenerator\Sample\User;
use Polidog\UnitTestGenerator\TestClassGenerator;

$generator = new TestClassGenerator();
$code = $generator->generate(User::class);
var_dump($code);
