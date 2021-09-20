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
        $statusCode = StatusCode::tryFromName($name);
        if (is_null($statusCode)) {
            $enumName = static::class;
            throw new ValueError("$name is not a valid name for enum \"$enumName\"");
        }
        return $statusCode;
    }

    public static function fromInteger(int $integer): StatusCode
    {
        $statusCode = StatusCode::tryFromInteger($integer);
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
        $name = $reasonPhrase->name;
        $statusCode = StatusCode::fromName($name);
        return $statusCode;
    }

    public static function tryFromName(?string $name): ?StatusCode
    {
        return match ($name) {
            'HTTP_100' => StatusCode::HTTP_100,
            'HTTP_101' => StatusCode::HTTP_101,
            'HTTP_102' => StatusCode::HTTP_102,
            'HTTP_103' => StatusCode::HTTP_103,
            'HTTP_200' => StatusCode::HTTP_200,
            'HTTP_201' => StatusCode::HTTP_201,
            'HTTP_202' => StatusCode::HTTP_202,
            'HTTP_203' => StatusCode::HTTP_203,
            'HTTP_204' => StatusCode::HTTP_204,
            'HTTP_205' => StatusCode::HTTP_205,
            'HTTP_206' => StatusCode::HTTP_206,
            'HTTP_207' => StatusCode::HTTP_207,
            'HTTP_208' => StatusCode::HTTP_208,
            'HTTP_226' => StatusCode::HTTP_226,
            'HTTP_300' => StatusCode::HTTP_300,
            'HTTP_301' => StatusCode::HTTP_301,
            'HTTP_302' => StatusCode::HTTP_302,
            'HTTP_303' => StatusCode::HTTP_303,
            'HTTP_304' => StatusCode::HTTP_304,
            'HTTP_305' => StatusCode::HTTP_305,
            'HTTP_306' => null, // intentionally null
            'HTTP_307' => StatusCode::HTTP_307,
            'HTTP_308' => StatusCode::HTTP_308,
            'HTTP_400' => StatusCode::HTTP_400,
            'HTTP_401' => StatusCode::HTTP_401,
            'HTTP_402' => StatusCode::HTTP_402,
            'HTTP_403' => StatusCode::HTTP_403,
            'HTTP_404' => StatusCode::HTTP_404,
            'HTTP_405' => StatusCode::HTTP_405,
            'HTTP_406' => StatusCode::HTTP_406,
            'HTTP_407' => StatusCode::HTTP_407,
            'HTTP_408' => StatusCode::HTTP_408,
            'HTTP_409' => StatusCode::HTTP_409,
            'HTTP_410' => StatusCode::HTTP_410,
            'HTTP_411' => StatusCode::HTTP_411,
            'HTTP_412' => StatusCode::HTTP_412,
            'HTTP_413' => StatusCode::HTTP_413,
            'HTTP_414' => StatusCode::HTTP_414,
            'HTTP_415' => StatusCode::HTTP_415,
            'HTTP_416' => StatusCode::HTTP_416,
            'HTTP_417' => StatusCode::HTTP_417,
            'HTTP_421' => StatusCode::HTTP_421,
            'HTTP_422' => StatusCode::HTTP_422,
            'HTTP_423' => StatusCode::HTTP_423,
            'HTTP_424' => StatusCode::HTTP_424,
            'HTTP_425' => StatusCode::HTTP_425,
            'HTTP_426' => StatusCode::HTTP_426,
            'HTTP_428' => StatusCode::HTTP_428,
            'HTTP_429' => StatusCode::HTTP_429,
            'HTTP_431' => StatusCode::HTTP_431,
            'HTTP_451' => StatusCode::HTTP_451,
            'HTTP_500' => StatusCode::HTTP_500,
            'HTTP_501' => StatusCode::HTTP_501,
            'HTTP_502' => StatusCode::HTTP_502,
            'HTTP_503' => StatusCode::HTTP_503,
            'HTTP_504' => StatusCode::HTTP_504,
            'HTTP_505' => StatusCode::HTTP_505,
            'HTTP_506' => StatusCode::HTTP_506,
            'HTTP_507' => StatusCode::HTTP_507,
            'HTTP_508' => StatusCode::HTTP_508,
            'HTTP_510' => StatusCode::HTTP_510,
            'HTTP_511' => StatusCode::HTTP_511,
            null => null,
            default => null,
        };
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
        $statusCode = StatusCode::tryFrom($integer);
        return $statusCode;
    }
}
