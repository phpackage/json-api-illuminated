<?php

use Illuminate\Container\Container;
use Illuminate\Http\Response;
use Neomerx\JsonApi\Contracts\Document\ErrorInterface;
use Neomerx\JsonApi\Contracts\Encoder\EncoderInterface;
use Neomerx\JsonApi\Contracts\Http\Headers\MediaTypeInterface;

if (!function_exists('illuminated_json_api_encoder')) {
    /**
     * @return EncoderInterface
     */
    function illuminated_json_api_encoder(): EncoderInterface
    {
        return Container::getInstance()->get(EncoderInterface::class);
    }
}

if (!function_exists('illuminated_json_api_response')) {
    /**
     * @param object|array|Iterator|null $resource
     * @param int $status
     * @return Response
     */
    function illuminated_json_api_response($resource, int $status = null): Response
    {
        return new Response(
            illuminated_json_api_encoder()->encodeData($resource),
            $status ?? Response::HTTP_OK,
            [
                'Content-Type' => MediaTypeInterface::JSON_API_MEDIA_TYPE,
            ]
        );
    }
}

if (!function_exists('illuminated_json_api_error_response')) {
    /**
     * @param ErrorInterface $error
     * @param int $status
     * @return Response
     */
    function illuminated_json_api_error_response(ErrorInterface $error, int $status = null): Response
    {
        return new Response(
            illuminated_json_api_encoder()->encodeError($error),
            $status ?? Response::HTTP_BAD_REQUEST,
            [
                'Content-Type' => MediaTypeInterface::JSON_API_MEDIA_TYPE,
            ]
        );
    }
}
