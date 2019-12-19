<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Sentence;

use Polidog\SpyGenerator\Ast;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;

class TestMethods implements Sentence
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
        $methodNodes = $this->ast->methods();
        foreach ($methodNodes as $node) {
            $methodGenerator = new MethodGenerator();
            $methodGenerator->setName('test'.ucfirst($node->name));
            $methodGenerator->setReturnType('void');
            $generator->addMethodFromGenerator($methodGenerator);
        }
    }
}
