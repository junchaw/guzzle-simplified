<?php

namespace A;

use GuzzleHttp\Client as BaseClient;

class Client
{
    /**
     * @var BaseClient
     */
    protected static $instance;

    public static function instance()
    {
        if (static::$instance) {
            return static::$instance;
        }

        return static::$instance = new BaseClient();
    }

    public static function get(string $url, array $params)
    {
        return static::instance()->get($url, compact('params'))->getBody()->getContents();
    }

    public static function post(string $url, array $form_params)
    {
        return static::instance()->post($url, compact('form_params'))->getBody()->getContents();
    }
}
