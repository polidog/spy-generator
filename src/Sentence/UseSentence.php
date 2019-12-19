<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

use PhpParser\Node;
use Polidog\SpyGenerator\Ast;
use Zend\Code\Generator\ClassGenerator;

class UseSentence implements Sentence
{
    /**
     * @var Ast
     */
    private $ast;

    public function __construct(Ast $ast)
    {
        $this->ast = $ast;
    }

    public function __invoke(ClassGenerator $generator): void
    {
        /** @var Node\Stmt\UseUse $node */
        foreach ($this->ast->useStatement() as $node) {
            $generator->addUse(implode('\\', $node->name->parts));
        }
    }
}
