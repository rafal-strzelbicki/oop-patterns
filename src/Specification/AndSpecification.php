<?php
declare(strict_types=1);

namespace Patterns\Specification;

class AndSpecification extends AbstractSpecification
{
    private $current;
    private $other;

    public function __construct(Specification $current, Specification $other)
    {
        $this->current = $current;
        $this->other = $other;
    }

    public function isSatisfied($object) : bool
    {
        return $this->current->isSatisfied($object) && $this->other->isSatisfied($object);
    }
}
