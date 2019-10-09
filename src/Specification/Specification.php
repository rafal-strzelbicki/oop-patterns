<?php
declare(strict_types=1);

namespace Patterns\Specification;

interface Specification
{
    public function isSatisfied($object) : bool;
    public function and(Specification $specification) : Specification;
    public function or(Specification $specification) : Specification;
    public function not() : Specification;
}
