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
 * String values for HTTP Methods as defined in IETF RFC 5789 and RFC 7231.
 */
enum Method: string
{
    case GET = 'GET';
    case HEAD = 'HEAD';
    case POST = 'POST';
    case PUT = 'PUT';
    case DELETE = 'DELETE';
    case CONNECT = 'CONNECT';
    case OPTIONS = 'OPTIONS';
    case TRACE = 'TRACE';
    case PATCH = 'PATCH';

    public static function fromName(string $name): Method
    {
        $method = self::tryFromName($name);

        if (is_null($method)) {
            $enumName = static::class;
            throw new ValueError("$name is not a valid name for enum \"$enumName\"");
        }

        return $method;
    }

    public static function tryFromName(?string $name): ?Method
    {
        // We aren't allowed to pass a null value to strtoupper(), so we have to handle this early.
        if (is_null($name)) {
            return null;
        }

        $name = strtoupper($name);

        if (defined("self::$name")) {
            /**
             * @var Method
             */
            $enumCase = constant("self::$name");
            return $enumCase;
        }

        return null;
    }
}
