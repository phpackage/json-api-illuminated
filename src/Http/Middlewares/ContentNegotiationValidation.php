<?php

namespace Phpackage\Illuminated\JsonApi\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Neomerx\JsonApi\Contracts\Http\Headers\MediaTypeInterface;
use Phpackage\Illuminated\JsonApi\ErrorFactory;

class ContentNegotiationValidation
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$this->validContentTypeHeaderForRequest($request)) {
            return illuminated_json_api_error_response(ErrorFactory::buildUnsupportedMediaType());
        }

        if (!$this->validAcceptHeaderForRequest($request)) {
            return illuminated_json_api_error_response(ErrorFactory::buildNotAcceptable());
        }

        /** @var Response $response */
        $response = $next($request);

        $response->header('Content-Type', MediaTypeInterface::JSON_API_MEDIA_TYPE);

        return $response;
    }

    protected function validContentTypeHeaderForRequest(Request $request): bool
    {
        if (in_array($request->getMethod(), ['POST', 'PUT', 'PATCH'])) {
            return $request->header('Content-Type') === MediaTypeInterface::JSON_API_MEDIA_TYPE;
        }

        return true;
    }

    protected function validAcceptHeaderForRequest(Request $request): bool
    {
        $currentAcceptHeader = $request->header('Accept');

        if (Config::get('json-api-illuminated.ignore-accept-header') === true
            || strpos($currentAcceptHeader, '*/*') !== false) {
            return true;
        }

        return strpos($currentAcceptHeader, MediaTypeInterface::JSON_API_MEDIA_TYPE) !== false;
    }
}
