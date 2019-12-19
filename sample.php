<?php

declare(strict_types=1);
require 'vendor/autoload.php';

$generator = new \Polidog\UnitTestGenerator\TestClassGenerator();
$code = $generator->generate(\Polidog\UnitTestGenerator\Tests\Hoge::class);
var_dump($code);
