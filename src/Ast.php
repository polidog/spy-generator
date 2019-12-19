<?php

declare(strict_types=1);

namespace Polidog\SpyGenerator;

use PhpParser\Node;
use PhpParser\ParserFactory;
use Polidog\SpyGenerator\Exception\AstException;

class Ast
{
    /**
     * @var Node\Stmt[]
     */
    private $nodes;

    public function __construct(string $code)
    {
        $this->nodes = (new ParserFactory())->create(ParserFactory::ONLY_PHP7)->parse($code);
    }

    /**
     * @return Node\Stmt\UseUse[]
     */
    public function useStatement(): array
    {
        $results = [];
        $nsNode = $this->namespace();
        foreach ($nsNode->stmts as $node) {
            if ('Stmt_Use' === $node->getType()) {
                foreach ($node->uses as $use) {
                    $results[] = $use;
                }
            }
        }

        return $results;
    }

    /**
     * @return Node\Stmt\ClassMethod[]
     */
    public function methods(): array
    {
        $methods = [];
        $classNode = $this->class();
        foreach ($classNode->stmts as $node) {
            if (('Stmt_ClassMethod' === $node->getType()) && '__construct' !== (string) $node->name) {
                $methods[] = $node;
            }
        }

        return $methods;
    }

    private function class(): Node\Stmt\Class_
    {
        $nsNode = $this->namespace();
        foreach ($nsNode->stmts as $node) {
            if ('Stmt_Class' === $node->getType()) {
                return $node;
            }
        }

        throw new AstException('Class not found');
    }

    private function namespace(): Node\Stmt\Namespace_
    {
        foreach ($this->nodes as $node) {
            if ('Stmt_Namespace' === $node->getType()) {
                return $node;
            }
        }

        throw new AstException('Namespace not found');
    }
}
