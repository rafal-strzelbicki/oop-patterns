<?php
declare(strict_types=1);

namespace Patterns\Specification\Examples;

use DateTime;
use Patterns\Specification\AbstractSpecification;

class IsFridaySpecification extends AbstractSpecification
{
    public function isSatisfied($object): bool
    {
        if ($object instanceof DateTime) {
            return (int) date('N', $object->getTimestamp()) === 5;
        }

        return false;
    }
}
