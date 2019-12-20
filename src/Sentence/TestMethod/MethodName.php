<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence\TestMethod;

use PhpParser\Node;
use Polidog\SpyGenerator\Code\ClassCode;
use Zend\Code\Generator\MethodGenerator;

class MethodName implements MethodSentence
{
    public function __invoke(MethodGenerator $generator, Node $node, ClassCode $classCode)
    {
        $generator->setName('test'.ucfirst((string) $node->name));
    }
}
