<?php
declare(strict_types=1);

namespace Patterns\Specification;

abstract class AbstractSpecification implements Specification
{
    public function and(Specification $specification) : Specification
    {
        return new AndSpecification($this, $specification);
    }

    public function or(Specification $specification) : Specification
    {
        return new OrSpecification($this, $specification);
    }

    public function not() : Specification
    {
        return new NotSpecification($this);
    }
}
