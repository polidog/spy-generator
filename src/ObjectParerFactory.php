<?php

declare(strict_types=1);

namespace Polidog\UnitTestGenerator;

use Helicon\ObjectTypeParser\Parser;

class ObjectParerFactory
{
    public function __invoke()
    {
        return new Parser();
    }
}
