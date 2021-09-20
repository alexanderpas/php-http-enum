<?php

/**
 * Copyright Alexander Pas 2021.
 * Distributed under the Boost Software License, Version 1.0.
 * (See accompanying file LICENSE_1_0.txt or copy at https://www.boost.org/LICENSE_1_0.txt)
 */

declare(strict_types=1);

namespace Alexanderpas\Common\HTTP\Tests;

use Alexanderpas\Common\HTTP\ReasonPhrase;
use Alexanderpas\Common\HTTP\StatusCode;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

use ValueError;

/**
 * @covers \Alexanderpas\Common\HTTP\ReasonPhrase
 * @covers \Alexanderpas\Common\HTTP\StatusCode
 */
class ReasonPhrasePositionalTest extends TestCase
{
    /**
     * @var ReasonPhrase[]
     */
    private array $cases;

    public function setUp(): void
    {
        $this->cases = ReasonPhrase::cases();
    }

    public function testTryFromNames(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = $case->name;
            $reasonPhrase = ReasonPhrase::tryFromName($name);
            Assert::assertThat($reasonPhrase, Assert::identicalTo($case));
        }
    }

    public function testFromNames(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = $case->name;
            $reasonPhrase = ReasonPhrase::fromName($name);
            Assert::assertThat($reasonPhrase, Assert::identicalTo($case));
        }
    }

    public function testTryFromInteger(): void
    {
        foreach ($this->cases as $case) {
            $statusCode = StatusCode::fromReasonPhrase($case);
            /**
             * @var int $statusCode->value
             */
            $integer = $statusCode->value;
            $reasonPhrase = ReasonPhrase::tryFromInteger($integer);
            Assert::assertThat($reasonPhrase, Assert::identicalTo($case));
        }
    }

    public function testFromInteger(): void
    {
        foreach ($this->cases as $case) {
            $statusCode = StatusCode::fromReasonPhrase($case);
            /**
             * @var int $statusCode->value
             */
            $integer = $statusCode->value;
            $reasonPhrase = ReasonPhrase::fromInteger($integer);
            Assert::assertThat($reasonPhrase, Assert::identicalTo($case));
        }
    }

    public function testStatusCodeConversion(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = $case->name;
            $statusCode = StatusCode::fromName($name);
            $reasonPhrase = ReasonPhrase::fromStatusCode($statusCode);
            Assert::assertThat($reasonPhrase, Assert::identicalTo($case));
        }
    }

    public function testNullFromName(): void
    {
        $reasonPhrase = ReasonPhrase::tryFromName(null);
        Assert::assertThat($reasonPhrase, Assert::isNull());
    }

    public function testNullFromInteger(): void
    {
        $reasonPhrase = ReasonPhrase::tryFromInteger(null);
        Assert::assertThat($reasonPhrase, Assert::isNull());
    }

    public function testInvalidFromName(): void
    {
        $invalidName = 'INVALID';
        $reasonPhrase = ReasonPhrase::tryFromName($invalidName);
        Assert::assertThat($reasonPhrase, Assert::isNull());
        $this->expectException(ValueError::class);
        ReasonPhrase::fromName($invalidName);
    }

    public function testInvalidFromInteger(): void
    {
        $invalidValue = -1;
        $reasonPhrase = ReasonPhrase::tryFromInteger($invalidValue);
        Assert::assertThat($reasonPhrase, Assert::isNull());
        $this->expectException(ValueError::class);
        ReasonPhrase::fromInteger($invalidValue);
    }

    public function testCode306Name(): void
    {
        $name = 'HTTP_306';
        $reasonPhrase = ReasonPhrase::tryFromName($name);
        Assert::assertThat($reasonPhrase, Assert::isNull());
        $this->expectException(ValueError::class);
        ReasonPhrase::fromName($name);
    }

    public function testCode306Integer(): void
    {
        $int306 = 306;
        $reasonPhrase = ReasonPhrase::tryFromInteger($int306);
        Assert::assertThat($reasonPhrase, Assert::isNull());
        $this->expectException(ValueError::class);
        ReasonPhrase::fromInteger($int306);
    }
}
