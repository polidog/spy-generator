<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

use Zend\Code\Generator\ClassGenerator;

interface Sentence
{
    public function __invoke(ClassGenerator $generator): void;
}
