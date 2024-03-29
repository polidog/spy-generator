<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

use PhpParser\Node;
use Polidog\SpyGenerator\Code\ClassCode;
use Zend\Code\Generator\ClassGenerator;

class UseSentence implements Sentence
{
    public function __invoke(ClassGenerator $generator, ClassCode $classCode): void
    {
        /** @var Node\Stmt\UseUse $node */
        foreach ($classCode->ast->useStatement() as $node) {
            $generator->addUse(implode('\\', $node->name->parts));
        }
    }
}
