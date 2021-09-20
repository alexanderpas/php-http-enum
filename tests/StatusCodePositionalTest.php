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
class StatusCodePositionalTest extends TestCase
{
    /**
     * @var StatusCode[]
     */
    private array $cases;

    public function setUp(): void
    {
        $this->cases = StatusCode::cases();
    }

    public function testTryFromNames(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = $case->name;
            $statusCode = StatusCode::tryFromName($name);
            Assert::assertThat($statusCode, Assert::identicalTo($case));
        }
    }

    public function testFromNames(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = $case->name;
            $statusCode = StatusCode::fromName($name);
            Assert::assertThat($statusCode, Assert::identicalTo($case));
        }
    }

    public function testValues(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var int $case->value
             */
            $value = $case->value;
            $name = "HTTP_{$value}";
            $statusCode = StatusCode::FromName($name);
            Assert::assertThat($statusCode, Assert::identicalTo($case));
        }
    }

    public function testTryFromInteger(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var int $case->value
             */
            $value = $case->value;
            $statusCode = StatusCode::tryFromInteger($value);
            Assert::assertThat($statusCode, Assert::identicalTo($case));
        }
    }

    public function testFromInteger(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var int $case->value
             */
            $value = $case->value;
            $statusCode = StatusCode::fromInteger($value);
            Assert::assertThat($statusCode, Assert::identicalTo($case));
        }
    }

    public function testReasonPhraseConversion(): void
    {
        foreach ($this->cases as $case) {
            /**
             * @var string $case->name
             */
            $name = $case->name;
            $reasonPhrase = ReasonPhrase::fromName($name);
            $statusCode = StatusCode::fromReasonPhrase($reasonPhrase);
            Assert::assertThat($statusCode, Assert::identicalTo($case));
        }
    }

    public function testNullFromName(): void
    {
        $null = null;
        $statusCode = StatusCode::tryFromName($null);
        Assert::assertThat($statusCode, Assert::isNull());
    }

    public function testNullFromInteger(): void
    {
        $null = null;
        $statusCode = StatusCode::tryFromInteger($null);
        Assert::assertThat($statusCode, Assert::isNull());
    }

    public function testInvalidFromName(): void
    {
        $invalidName = 'INVALID';
        $statusCode = StatusCode::tryFromName($invalidName);
        Assert::assertThat($statusCode, Assert::isNull());
        $this->expectException(ValueError::class);
        StatusCode::fromName($invalidName);
    }

    public function testInvalidFromInteger(): void
    {
        $invalidValue = -1;
        $statusCode = StatusCode::tryFromInteger($invalidValue);
        Assert::assertThat($statusCode, Assert::isNull());
        $this->expectException(ValueError::class);
        StatusCode::fromInteger($invalidValue);
    }

    public function testCode306Name(): void
    {
        $name = 'HTTP_306';
        $statusCode = StatusCode::tryFromName($name);
        Assert::assertThat($statusCode, Assert::isNull());
        $this->expectException(ValueError::class);
        StatusCode::fromName($name);
    }

    public function testCode306Integer(): void
    {
        $int306 = 306;
        $statusCode = StatusCode::tryFromInteger($int306);
        Assert::assertThat($statusCode, Assert::isNull());
        $this->expectException(ValueError::class);
        StatusCode::fromInteger($int306);
    }
}
