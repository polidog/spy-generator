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

    /**
     * @var Properties
     */
    public $properties;

    public function __construct(\ReflectionClass $reflection, Ast $ast, Properties $properties)
    {
        $this->reflection = $reflection;
        $this->ast = $ast;
        $this->properties = $properties;
    }
}
