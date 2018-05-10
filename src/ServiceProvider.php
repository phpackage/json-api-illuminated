<?php

namespace Phpackage\Illuminated\JsonApi;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\Config;
use Neomerx\JsonApi\Encoder\EncoderOptions;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        if (method_exists($this->app, 'configure')) {
            $this->app->configure('json-api-illuminated');
        }

        $this->mergeConfigFrom(__DIR__ . '/../config/json-api-illuminated.php', 'json-api-illuminated');

        $this->app->singleton(EncoderOptions::class, function () {
            return new EncoderOptions(
                Config::get('json-api-illuminated.encoder.options'),
                Config::get('json-api-illuminated.encoder.url_prefix'),
                Config::get('json-api-illuminated.encoder.depth')
            );
        });

        $this->app->singleton(Encoder::class, function (Container $app) {
            return Encoder::instance(
                Config::get('json-api-illuminated.schemas'),
                $app->get(EncoderOptions::class)
            );
        });
    }

    public function provides()
    {
        return [
            EncoderOptions::class,
            Encoder::class,
        ];
    }
}
