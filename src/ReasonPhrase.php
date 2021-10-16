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
        $reasonPhrase = self::tryFromName($name);

        if (is_null($reasonPhrase)) {
            $enumName = static::class;
            throw new ValueError("$name is not a valid name for enum \"$enumName\"");
        }

        return $reasonPhrase;
    }

    public static function fromInteger(int $integer): ReasonPhrase
    {
        $reasonPhrase = self::tryFromInteger($integer);

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
        return self::fromName($statusCode->name);
    }

    public static function tryFromName(?string $name): ?ReasonPhrase
    {
        if (defined("self::$name")) {
            /**
             * @var ReasonPhrase
             */
            $enumCase = constant("self::$name");
            return $enumCase;
        }

        return null;
    }

    public static function tryFromInteger(?int $integer): ?ReasonPhrase
    {
        $statusCode = StatusCode::tryFromInteger($integer);
        if (is_null($statusCode)) {
            return null;
        }
        return self::FromStatusCode($statusCode);
    }
}
