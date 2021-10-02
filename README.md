# HTTP Enums For PHP 8.1 and above

[![PHP Version Require](http://poser.pugx.org/alexanderpas/http-enum/require/php)](https://packagist.org/packages/alexanderpas/http-enum)
[![Latest Stable Version](http://poser.pugx.org/alexanderpas/http-enum/v)](https://packagist.org/packages/alexanderpas/http-enum)
[![Latest Unstable Version](http://poser.pugx.org/alexanderpas/http-enum/v/unstable)](https://packagist.org/packages/alexanderpas/http-enum)
[![License](http://poser.pugx.org/alexanderpas/http-enum/license)](https://packagist.org/packages/alexanderpas/http-enum)

This package provides HTTP Methods, Status Codes and Reason Phrases as PHP 8.1+ enums

All [IANA registered HTTP Status codes][STATUS] and corresponding Reason Phrases as of the latest update on 2018-09-21 are supported.

This includes the HTTP Methods defined in [RFC 5789] and [RFC 7231], as well as all Status Codes and Reason Phrases as defined in [HTTP/1.1] ([RFC 7231], [RFC 7232], [RFC 7233], [RFC 7235]) and [HTTP/2] ([RFC 7540]) as well as other RFC's defining HTTP status codes such as [WebDAV] ([RFC 2518], [RFC 4918], [RFC 5842], [RFC 8144]) and more ([RFC 8297], [RFC 3229], [RFC 7538], [RFC 7694], [RFC 6585], [RFC 7725], [RFC 2295], [RFC 2774])

## Requirements

- PHP 8.1 or above

## Installation

### Composer:

    composer require alexanderpas/http-enum

### Manually (Without Composer):

include the `src/Method.php` file in order to use the HTTP methods enum.

include both the `src/ReasonPhrase.php` file as well as the `src/StatusCode.php` file in order to use the HTTP Status Code enum or the HTTP Reason Phrase enum.

## Available Enums and Enum methods

All available Enums live in the `\Alexanderpas\Common\HTTP` namespace.

- HTTP Methods are represented by the `\Alexanderpas\Common\HTTP\Method` enum.
- HTTP Status Codes are represented by the `\Alexanderpas\Common\HTTP\StatusCode` enum.
- HTTP Reason Phrases are represented by the `\Alexanderpas\Common\HTTP\ReasonPhrase` enum.

In addition to the Enum methods available by default on Backed Enums, the following Enum methods are available.

- `Method::fromName(string $name): Method` Gives back a HTTP method enum when provided with a valid uppercase HTTP method. (such as `'GET'` or `'POST'`)
- `StatusCode::fromInteger(int $integer): StatusCode` Gives back a HTTP Status Code enum when provided with a valid HTTP status code as integer. (such as `200` or `404`)
- `StatusCode::fromName(string $name): StatusCode` Gives back a HTTP Status Code enum when provided with a valid HTTP status code as a `HTTP_` prefixed string. (such as `'HTTP_200'` or `'HTTP_404'`)
- `ReasonPhrase::fromInteger(int  $integer): ReasonPhrase` Gives back a HTTP Reason Phrase enum when provided with a valid HTTP status code as integer. (such as `200` or `404`)
- `ReasonPhrase::fromName(string $name): ReasonPhrase` Gives back a HTTP Reason Phrase enum when provided with a valid HTTP status code as a `HTTP_` prefixed string. (such as `'HTTP_200'` or `'HTTP_404'`)

All of the above methods also have a try variant (such as `Method::tryFromName(?string $name): ?Method`), which returns `null` if an invalid value of the correct type has been given instead of thowing an exception.

Additionally, you can change between Status Code enums and Reason Phrase enums using the following methods:

- `ReasonPhrase::fromStatusCode(StatusCode $statusCode): ReasonPhrase` changes a Status Code enum into the corresponding Reason Phrase enum.
- `StatusCode::fromReasonPhrase(ReasonPhrase $reasonPhrase): StatusCode` changes a Reason Phrase enum into the corresponding Status Code enum.

These methods do not have a try variant.

You can get the respective string or integer representation as usual by reading the `value` attribute on the enum.

## License

Copyright Alexander Pas 2021.
Distributed under the Boost Software License, Version 1.0.
(See accompanying file [LICENSE_1_0.txt][LICENSE] or copy at https://www.boost.org/LICENSE_1_0.txt)

## Notes

- Support for the HTTP status code 306 has intentionally been removed as it has been defined as Unused in [RFC 7231, Section 6.4.6][RFC 7231]
- The Methods, Status Codes and Reason Phrases defined in the [Hyper Text Coffee Pot Control Protocol][HTCPCP] ([RFC 2324]) are not supported as they aren't properly registered and provide Methods unique to that specific protocol.
- The [Request Methods specific to WebDAV][WebDAV] are not supported.


[LICENSE]: LICENSE_1_0.txt
[RFC 2295]: https://www.iana.org/go/rfc2295
[RFC 2324]: https://www.iana.org/go/rfc2324
[RFC 2518]: https://www.iana.org/go/rfc2518
[RFC 2774]: https://www.iana.org/go/rfc2774
[RFC 3229]: https://www.iana.org/go/rfc3229
[RFC 4918]: https://www.iana.org/go/rfc4918
[RFC 5789]: https://www.iana.org/go/rfc5789
[RFC 5842]: https://www.iana.org/go/rfc5842
[RFC 6585]: https://www.iana.org/go/rfc6585
[RFC 7231]: https://www.iana.org/go/rfc7231
[RFC 7232]: https://www.iana.org/go/rfc7232
[RFC 7233]: https://www.iana.org/go/rfc7233
[RFC 7235]: https://www.iana.org/go/rfc7235
[RFC 7538]: https://www.iana.org/go/rfc7538
[RFC 7540]: https://www.iana.org/go/rfc7540
[RFC 7725]: https://www.iana.org/go/rfc7725
[RFC 7694]: https://www.iana.org/go/rfc7694
[RFC 8144]: https://www.iana.org/go/rfc8144
[RFC 8297]: https://www.iana.org/go/rfc8297
[RFC 8470]: https://www.iana.org/go/rfc8470
[STATUS]: https://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
[HTTP/1.1]: https://en.wikipedia.org/wiki/HTTP/1.1
[HTTP/2]: https://en.wikipedia.org/wiki/HTTP/2
[WebDAV]: https://en.wikipedia.org/wiki/WebDAV
[HTCPCP]: https://en.wikipedia.org/wiki/HTCPCP
