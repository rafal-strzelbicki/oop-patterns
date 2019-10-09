<?php
declare(strict_types=1);

namespace Patterns\Specification;

class NotSpecification extends AbstractSpecification
{
    private $specification;

    public function __construct(Specification $specification)
    {
        $this->specification = $specification;
    }

    public function isSatisfied($object) : bool
    {
        return !$this->specification->isSatisfied($object);
    }
}
