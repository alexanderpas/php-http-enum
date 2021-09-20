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
 * Reason Phrases for HTTP Status codes as registered by IANA
 *
 * @see https://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
 */
enum ReasonPhrase: string
{
    // Informational 1xx
    case HTTP_100 = 'Continue';
    case HTTP_101 = 'Switching Protocols';
    case HTTP_102 = 'Processing';
    case HTTP_103 = 'Early Hints';
    // As of the last update on 2018-09-21, the status codes 104-199 are unassigned.

    // Successful 2xx
    case HTTP_200 = 'OK';
    case HTTP_201 = 'Created';
    case HTTP_202 = 'Accepted';
    case HTTP_203 = 'Non-Authoritative Information';
    case HTTP_204 = 'No Content';
    case HTTP_205 = 'Reset Content';
    case HTTP_206 = 'Partial Content';
    case HTTP_207 = 'Multi-Status';
    case HTTP_208 = 'Already Reported';
    // As of the last update on 2018-09-21, the status codes 209-225 are unassigned.
    case HTTP_226 = 'IM Used';
    // As of the last update on 2018-09-21, the status codes 227-299 are unassigned.

    // Redirection 3xx
    case HTTP_300 = 'Multiple Choices';
    case HTTP_301 = 'Moved Permanently';
    case HTTP_302 = 'Found';
    case HTTP_303 = 'See Other';
    case HTTP_304 = 'Not Modified';
    case HTTP_305 = 'Use Proxy';
    //case HTTP_306 = '(Unused)';
    case HTTP_307 = 'Temporary Redirect';
    case HTTP_308 = 'Permanent Redirect';
    // As of the last update on 2018-09-21, the status codes 309-399 are unassigned.

    // Client Error 4xx
    case HTTP_400 = 'Bad Request';
    case HTTP_401 = 'Unauthorized';
    case HTTP_402 = 'Payment Required';
    case HTTP_403 = 'Forbidden';
    case HTTP_404 = 'Not Found';
    case HTTP_405 = 'Method Not Allowed';
    case HTTP_406 = 'Not Acceptable';
    case HTTP_407 = 'Proxy Authentication Required';
    case HTTP_408 = 'Request Timeout';
    case HTTP_409 = 'Conflict';
    case HTTP_410 = 'Gone';
    case HTTP_411 = 'Length Required';
    case HTTP_412 = 'Precondition Failed';
    case HTTP_413 = 'Payload Too Large';
    case HTTP_414 = 'URI Too Long';
    case HTTP_415 = 'Unsupported Media Type';
    case HTTP_416 = 'Range Not Satisfiable';
    case HTTP_417 = 'Expectation Failed';
    // As of the last update on 2018-09-21, the status codes 418-420 are unassigned.
    case HTTP_421 = 'Misdirected Request';
    case HTTP_422 = 'Unprocessable Entity';
    case HTTP_423 = 'Locked';
    case HTTP_424 = 'Failed Dependency';
    case HTTP_425 = 'Too Early';
    case HTTP_426 = 'Upgrade Required';
    // As of the last update on 2018-09-21, the status code 427 is unassigned.
    case HTTP_428 = 'Precondition Required';
    case HTTP_429 = 'Too Many Requests';
    // As of the last update on 2018-09-21, the status code 430 is unassigned.
    case HTTP_431 = 'Request Header Fields Too Large';
    // As of the last update on 2018-09-21, the status codes 432-450 are unassigned.
    case HTTP_451 = 'Unavailable For Legal Reasons';
    // As of the last update on 2018-09-21, the status codes 452-499 are unassigned.

    // Server Error 5xx
    case HTTP_500 = 'Internal Server Error';
    case HTTP_501 = 'Not Implemented';
    case HTTP_502 = 'Bad Gateway';
    case HTTP_503 = 'Service Unavailable';
    case HTTP_504 = 'Gateway Timeout';
    case HTTP_505 = 'HTTP Version Not Supported';
    case HTTP_506 = 'Variant Also Negotiates';
    case HTTP_507 = 'Insufficient Storage';
    case HTTP_508 = 'Loop Detected';
    // As of the last update on 2018-09-21, the status code 509 is unassigned.
    case HTTP_510 = 'Not Extended';
    case HTTP_511 = 'Network Authentication Required';
    // As of the last update on 2018-09-21, the status codes 512-599 are unassigned.

    public static function fromName(string $name): ReasonPhrase
    {
        $reasonPhrase = ReasonPhrase::tryFromName($name);
        if (is_null($reasonPhrase)) {
            $enumName = static::class;
            throw new ValueError("$name is not a valid name for enum \"$enumName\"");
        }
        return $reasonPhrase;
    }

    public static function fromInteger(int $integer): ReasonPhrase
    {
        $reasonPhrase = ReasonPhrase::tryFromInteger($integer);
        if (is_null($reasonPhrase)) {
            $enumName = static::class;
            throw new ValueError("$integer is not a valid value for enum \"$enumName\"");
        }
        return $reasonPhrase;
    }

    public static function fromStatusCode(StatusCode $statusCode): ReasonPhrase
    {
        /**
         * @var string $statusCode->name
         */
        $name = $statusCode->name;
        $reasonPhrase = ReasonPhrase::fromName($name);
        return $reasonPhrase;
    }

    public static function tryFromName(?string $name): ?ReasonPhrase
    {
        return match ($name) {
            'HTTP_100' => ReasonPhrase::HTTP_100,
            'HTTP_101' => ReasonPhrase::HTTP_101,
            'HTTP_102' => ReasonPhrase::HTTP_102,
            'HTTP_103' => ReasonPhrase::HTTP_103,
            'HTTP_200' => ReasonPhrase::HTTP_200,
            'HTTP_201' => ReasonPhrase::HTTP_201,
            'HTTP_202' => ReasonPhrase::HTTP_202,
            'HTTP_203' => ReasonPhrase::HTTP_203,
            'HTTP_204' => ReasonPhrase::HTTP_204,
            'HTTP_205' => ReasonPhrase::HTTP_205,
            'HTTP_206' => ReasonPhrase::HTTP_206,
            'HTTP_207' => ReasonPhrase::HTTP_207,
            'HTTP_208' => ReasonPhrase::HTTP_208,
            'HTTP_226' => ReasonPhrase::HTTP_226,
            'HTTP_300' => ReasonPhrase::HTTP_300,
            'HTTP_301' => ReasonPhrase::HTTP_301,
            'HTTP_302' => ReasonPhrase::HTTP_302,
            'HTTP_303' => ReasonPhrase::HTTP_303,
            'HTTP_304' => ReasonPhrase::HTTP_304,
            'HTTP_305' => ReasonPhrase::HTTP_305,
            'HTTP_306' => null, // intentionally null
            'HTTP_307' => ReasonPhrase::HTTP_307,
            'HTTP_308' => ReasonPhrase::HTTP_308,
            'HTTP_400' => ReasonPhrase::HTTP_400,
            'HTTP_401' => ReasonPhrase::HTTP_401,
            'HTTP_402' => ReasonPhrase::HTTP_402,
            'HTTP_403' => ReasonPhrase::HTTP_403,
            'HTTP_404' => ReasonPhrase::HTTP_404,
            'HTTP_405' => ReasonPhrase::HTTP_405,
            'HTTP_406' => ReasonPhrase::HTTP_406,
            'HTTP_407' => ReasonPhrase::HTTP_407,
            'HTTP_408' => ReasonPhrase::HTTP_408,
            'HTTP_409' => ReasonPhrase::HTTP_409,
            'HTTP_410' => ReasonPhrase::HTTP_410,
            'HTTP_411' => ReasonPhrase::HTTP_411,
            'HTTP_412' => ReasonPhrase::HTTP_412,
            'HTTP_413' => ReasonPhrase::HTTP_413,
            'HTTP_414' => ReasonPhrase::HTTP_414,
            'HTTP_415' => ReasonPhrase::HTTP_415,
            'HTTP_416' => ReasonPhrase::HTTP_416,
            'HTTP_417' => ReasonPhrase::HTTP_417,
            'HTTP_421' => ReasonPhrase::HTTP_421,
            'HTTP_422' => ReasonPhrase::HTTP_422,
            'HTTP_423' => ReasonPhrase::HTTP_423,
            'HTTP_424' => ReasonPhrase::HTTP_424,
            'HTTP_425' => ReasonPhrase::HTTP_425,
            'HTTP_426' => ReasonPhrase::HTTP_426,
            'HTTP_428' => ReasonPhrase::HTTP_428,
            'HTTP_429' => ReasonPhrase::HTTP_429,
            'HTTP_431' => ReasonPhrase::HTTP_431,
            'HTTP_451' => ReasonPhrase::HTTP_451,
            'HTTP_500' => ReasonPhrase::HTTP_500,
            'HTTP_501' => ReasonPhrase::HTTP_501,
            'HTTP_502' => ReasonPhrase::HTTP_502,
            'HTTP_503' => ReasonPhrase::HTTP_503,
            'HTTP_504' => ReasonPhrase::HTTP_504,
            'HTTP_505' => ReasonPhrase::HTTP_505,
            'HTTP_506' => ReasonPhrase::HTTP_506,
            'HTTP_507' => ReasonPhrase::HTTP_507,
            'HTTP_508' => ReasonPhrase::HTTP_508,
            'HTTP_510' => ReasonPhrase::HTTP_510,
            'HTTP_511' => ReasonPhrase::HTTP_511,
            null => null,
            default => null,
        };
    }

    public static function tryFromInteger(?int $integer): ?ReasonPhrase
    {
        $statusCode = StatusCode::tryFromInteger($integer);
        if (is_null($statusCode)) {
            return null;
        }
        return ReasonPhrase::FromStatusCode($statusCode);
    }
}
