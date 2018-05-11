<?php

return [
    // https://github.com/neomerx/json-api/wiki/Schemas
    'schemas' => [
    ],

    'encoder' => [
        // https://github.com/neomerx/json-api/wiki#encoderoptions
        'options' => 0,
        'url_prefix' => null,
        'depth' => 512,

        // http://jsonapi.org/format/#document-top-level
        'links' => [
        ],
        'meta' => [
        ],
    ],

    'ignore-accept-header' => true,
];
