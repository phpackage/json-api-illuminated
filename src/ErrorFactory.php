<?php

namespace Phpackage\Illuminated\JsonApi;

use Illuminate\Http\Response;
use Neomerx\JsonApi\Contracts\Document\LinkInterface;
use Neomerx\JsonApi\Document\Error;
use Neomerx\JsonApi\Document\Link;

class ErrorFactory
{
    public static function buildUnsupportedMediaType(
        $id = null,
        LinkInterface $aboutLink = null,
        $code = null,
        array $source = null,
        $meta = null
    ): Error {
        return new Error(
            $id ?? null,
            $aboutLink ?? new Link('http://jsonapi.org/format/#content-negotiation-clients'),
            Response::HTTP_UNSUPPORTED_MEDIA_TYPE,
            $code ?? null,
            Response::$statusTexts[Response::HTTP_UNSUPPORTED_MEDIA_TYPE],
            null,
            $source,
            $meta
        );
    }

    public static function buildNotAcceptable(
        $id = null,
        LinkInterface $aboutLink = null,
        $code = null,
        array $source = null,
        $meta = null
    ): Error {
        return new Error(
            $id ?? null,
            $aboutLink ?? new Link('http://jsonapi.org/format/#content-negotiation-clients'),
            Response::HTTP_NOT_ACCEPTABLE,
            $code ?? null,
            Response::$statusTexts[Response::HTTP_NOT_ACCEPTABLE],
            null,
            $source,
            $meta
        );
    }
}
