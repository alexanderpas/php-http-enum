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
class MethodPositionalTest extends TestCase
{
    /**
     * @var Method[]
     */
    private array $cases;

    public function setUp(): void
    {
        $this->cases = Method::cases();
    }

    public function testCaconicalNameCapitalization(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = $case->name;
            $canonicalName = strtoupper($case->name);
            Assert::assertThat($name, Assert::identicalTo($canonicalName));
        }
    }

    public function testFromNamesUppercase(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = strtoupper($case->name);
            $method = Method::fromName($name);
            Assert::assertThat($method, Assert::identicalTo($case));
        }
    }

    public function testFromNamesLowercase(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = strtolower($case->name);
            $method = Method::fromName($name);
            Assert::assertThat($method, Assert::identicalTo($case));
        }
    }

    public function testFromNamesTitlecase(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = ucfirst(strtolower($case->name));
            $method = Method::fromName($name);
            Assert::assertThat($method, Assert::identicalTo($case));
        }
    }

    public function testFromNamesInvertedTitlecase(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = lcfirst(strtoupper($case->name));
            $method = Method::fromName($name);
            Assert::assertThat($method, Assert::identicalTo($case));
        }
    }

    public function testTryFromNamesUppercase(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = strtoupper($case->name);
            $method = Method::tryFromName($name);
            Assert::assertThat($method, Assert::identicalTo($case));
        }
    }

    public function testTryFromNamesLowercase(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = strtolower($case->name);
            $method = Method::tryFromName($name);
            Assert::assertThat($method, Assert::identicalTo($case));
        }
    }

    public function testTryFromNamesTitlecase(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = ucfirst(strtolower($case->name));
            $method = Method::tryFromName($name);
            Assert::assertThat($method, Assert::identicalTo($case));
        }
    }

    public function testTryFromNamesInvertedTitlecase(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = lcfirst(strtoupper($case->name));
            $method = Method::tryFromName($name);
            Assert::assertThat($method, Assert::identicalTo($case));
        }
    }

    public function testNullFromName(): void
    {
        $method = Method::tryFromName(null);
        Assert::assertThat($method, Assert::isNull());
    }

    public function testInvalidFromName(): void
    {
        $invalidName = 'INVALID';
        $method = Method::tryFromName($invalidName);
        Assert::assertThat($method, Assert::isNull());
        $this->expectException(ValueError::class);
        Method::fromName($invalidName);
    }
}
