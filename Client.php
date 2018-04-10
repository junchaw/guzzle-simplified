<?php

namespace Wbswjc;

use GuzzleHttp\Client;

class SimpleClient
{
    /**
     * @var Client
     */
    protected static $instance;

    public static function instance()
    {
        if (static::$instance) {
            return static::$instance;
        }

        return static::$instance = new Client();
    }

    public static function get(string $url, array $params): string
    {
        return static::instance()->get($url, compact('params'))->getBody()->getContents();
    }

    public static function post(string $url, array $form_params): string
    {
        return static::instance()->post($url, compact('form_params'))->getBody()->getContents();
    }
}
