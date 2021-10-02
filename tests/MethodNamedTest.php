<?php

/**
 * Copyright Alexander Pas 2021.
 * Distributed under the Boost Software License, Version 1.0.
 * (See accompanying file LICENSE_1_0.txt or copy at https://www.boost.org/LICENSE_1_0.txt)
 */

declare(strict_types=1);

namespace Alexanderpas\Common\HTTP\Tests;

use Alexanderpas\Common\HTTP\Method;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

use ValueError;

/**
 * @covers \Alexanderpas\Common\HTTP\Method
 */
class MethodNamedTest extends TestCase
{
    /**
     * @var Method[]
     */
    private array $cases;

    public function setUp(): void
    {
        $this->cases = Method::cases();
    }

    public function testFromNames(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = $case->name;
            $method = Method::fromName(name: $name);
            Assert::assertThat($method, Assert::identicalTo($case));

            /**
             * @var string $case->name
             */
            $name = strtolower($case->name);
            $method = Method::fromName(name: $name);
            Assert::assertThat($method, Assert::identicalTo($case));
        }
    }

    public function testTryFromNames(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = $case->name;
            $method = Method::tryFromName(name: $name);
            Assert::assertThat($method, Assert::identicalTo($case));

            /**
             * @var string $case->name
             */
            $name = strtolower($case->name);
            $method = Method::tryFromName(name: $name);
            Assert::assertThat($method, Assert::identicalTo($case));
        }
    }

    public function testNullFromName(): void
    {
        $method = Method::tryFromName(name: null);
        Assert::assertThat($method, Assert::isNull());
    }

    public function testInvalidFromName(): void
    {
        $invalidName = 'INVALID';
        $method = Method::tryFromName(name: $invalidName);
        Assert::assertThat($method, Assert::isNull());
        $this->expectException(ValueError::class);
        Method::fromName(name: $invalidName);
    }
}
