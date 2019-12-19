<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator\Code;

class ClassCode
{
    /**
     * @var \ReflectionClass
     */
    public $reflection;

    /**
     * @var Ast
     */
    public $ast;

    public function __construct(\ReflectionClass $reflection, Ast $ast)
    {
        $this->reflection = $reflection;
        $this->ast = $ast;
    }
}
