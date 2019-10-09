<?php
declare(strict_types=1);

namespace Patterns\Specification\Examples;

use DateTime;
use PHPUnit\Framework\TestCase;

class IsFridaySpecificationTest extends TestCase
{
    private const MONDAY = '21-10-2019';
    private const FRIDAY = '25-10-2019';

    public function testItIsSatisfiedByFriday() : void
    {
        $isFridaySpecification = new IsFridaySpecification();
        $this->assertFalse($isFridaySpecification->isSatisfied(new DateTime(self::MONDAY)));
        $this->assertTrue($isFridaySpecification->isSatisfied(new DateTime(self::FRIDAY)));
    }

    public function testItIsSatisfiedByMonday() : void
    {
        $isNotFridaySpecification = (new IsFridaySpecification())->not();
        $this->assertTrue($isNotFridaySpecification->isSatisfied(new DateTime(self::MONDAY)));
        $this->assertFalse($isNotFridaySpecification->isSatisfied(new DateTime(self::FRIDAY)));
    }

    public function testItIsSatisfiedByEitherFridayOrMonday() : void
    {
        $isFridaySpecification = new IsFridaySpecification();
        $isFridayOrMondaySpecification = $isFridaySpecification->or($isFridaySpecification->not());
        $this->assertTrue($isFridayOrMondaySpecification->isSatisfied(new DateTime(self::MONDAY)));
        $this->assertTrue($isFridayOrMondaySpecification->isSatisfied(new DateTime(self::FRIDAY)));
    }

    public function testItIsNeverSatisfied() : void
    {
        $isFridaySpecification = new IsFridaySpecification();
        $isFridayAndIsNotFridaySpecification = $isFridaySpecification->and($isFridaySpecification->not());
        $this->assertFalse($isFridayAndIsNotFridaySpecification->isSatisfied(new DateTime(self::MONDAY)));
        $this->assertFalse($isFridayAndIsNotFridaySpecification->isSatisfied(new DateTime(self::FRIDAY)));
    }
}
