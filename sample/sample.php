<?php

declare(strict_types=1);

require '../vendor/autoload.php';

use Polidog\SpyGenerator\ClassSpyGenerator;
use Polidog\SpyGenerator\Sample\User;
use Polidog\SpyGenerator\Sentence\RunnerFactory;

$runner = (new RunnerFactory())->newRunner();
$generator = new ClassSpyGenerator($runner);
$code = $generator->generate(User::class);
var_dump($code);
