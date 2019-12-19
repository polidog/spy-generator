<?php

declare(strict_types=1);

namespace Polidog\UnitTestGenerator;

interface Generator
{
    public function generate(string $className): string;
}
