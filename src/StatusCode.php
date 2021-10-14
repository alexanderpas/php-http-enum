<?php

/**
 * Copyright Alexander Pas 2021.
 * Distributed under the Boost Software License, Version 1.0.
 * (See accompanying file LICENSE_1_0.txt or copy at https://www.boost.org/LICENSE_1_0.txt)
 */

declare(strict_types=1);

namespace Alexanderpas\Common\HTTP;

use ValueError;

/**
 * Numeric values for HTTP Status codes as registered by IANA
 *
 * @see https://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
 */
enum StatusCode: int
{
    // Informational 1xx
    case HTTP_100 = 100;
    case HTTP_101 = 101;
    case HTTP_102 = 102;
    case HTTP_103 = 103;
    // As of the last update on 2018-09-21, the status codes 104-199 are unassigned.

    // Successful 2xx
    case HTTP_200 = 200;
    case HTTP_201 = 201;
    case HTTP_202 = 202;
    case HTTP_203 = 203;
    case HTTP_204 = 204;
    case HTTP_205 = 205;
    case HTTP_206 = 206;
    case HTTP_207 = 207;
    case HTTP_208 = 208;
    // As of the last update on 2018-09-21, the status codes 209-225 are unassigned.
    case HTTP_226 = 226;
    // As of the last update on 2018-09-21, the status codes 227-299 are unassigned.

    // Redirection 3xx
    case HTTP_300 = 300;
    case HTTP_301 = 301;
    case HTTP_302 = 302;
    case HTTP_303 = 303;
    case HTTP_304 = 304;
    case HTTP_305 = 305;
    // case HTTP_306 = 306; // (Unused)
    case HTTP_307 = 307;
    case HTTP_308 = 308;
    // As of the last update on 2018-09-21, the status codes 309-399 are unassigned.

    // Client Error 4xx
    case HTTP_400 = 400;
    case HTTP_401 = 401;
    case HTTP_402 = 402;
    case HTTP_403 = 403;
    case HTTP_404 = 404;
    case HTTP_405 = 405;
    case HTTP_406 = 406;
    case HTTP_407 = 407;
    case HTTP_408 = 408;
    case HTTP_409 = 409;
    case HTTP_410 = 410;
    case HTTP_411 = 411;
    case HTTP_412 = 412;
    case HTTP_413 = 413;
    case HTTP_414 = 414;
    case HTTP_415 = 415;
    case HTTP_416 = 416;
    case HTTP_417 = 417;
    // As of the last update on 2018-09-21, the status codes 418-420 are unassigned.
    case HTTP_421 = 421;
    case HTTP_422 = 422;
    case HTTP_423 = 423;
    case HTTP_424 = 424;
    case HTTP_425 = 425;
    case HTTP_426 = 426;
    // As of the last update on 2018-09-21, the status code 427 is unassigned.
    case HTTP_428 = 428;
    case HTTP_429 = 429;
    // As of the last update on 2018-09-21, the status code 430 is unassigned.
    case HTTP_431 = 431;
    // As of the last update on 2018-09-21, the status codes 432-450 are unassigned.
    case HTTP_451 = 451;
    // As of the last update on 2018-09-21, the status codes 452-499 are unassigned.

    // Server Error 5xx
    case HTTP_500 = 500;
    case HTTP_501 = 501;
    case HTTP_502 = 502;
    case HTTP_503 = 503;
    case HTTP_504 = 504;
    case HTTP_505 = 505;
    case HTTP_506 = 506;
    case HTTP_507 = 507;
    case HTTP_508 = 508;
    // As of the last update on 2018-09-21, the status code 509 is unassigned.
    case HTTP_510 = 510;
    case HTTP_511 = 511;
    // As of the last update on 2018-09-21, the status codes 512-599 are unassigned.

    public static function fromName(string $name): StatusCode
    {
        $statusCode = self::tryFromName($name);

        if (is_null($statusCode)) {
            $enumName = static::class;
            throw new ValueError("$name is not a valid name for enum \"$enumName\"");
        }

        return $statusCode;
    }

    public static function fromInteger(int $integer): StatusCode
    {
        $statusCode = self::tryFromInteger($integer);

        if (is_null($statusCode)) {
            $enumName = static::class;
            throw new ValueError("$integer is not a valid value for enum \"$enumName\"");
        }

        return $statusCode;
    }

    public static function fromReasonPhrase(ReasonPhrase $reasonPhrase): StatusCode
    {
        /**
         * @var string $reasonPhrase->name
         */
        return self::fromName($reasonPhrase->name);
    }

    public static function tryFromName(?string $name): ?StatusCode
    {
        foreach (self::cases() as $case) {
            if ($case->name === $name) {
                return $case;
            }
        }

        return null;
    }

    public static function tryFromInteger(?int $integer): ?StatusCode
    {
        if (is_null($integer)) {
            return null;
        }

        /**
         * @var ?StatusCode
         * @psalm-suppress UndefinedMethod
         */
        $statusCode = self::tryFrom($integer);
        return $statusCode;
    }
}
