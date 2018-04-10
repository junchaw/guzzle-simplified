<?php

namespace Wbswjc;

use GuzzleHttp\Client;

class SimpleClient
{
    /**
     * @var Client
     */
    protected static $instance;

    public static function instance(): Client
    {
        if (static::$instance) {
            return static::$instance;
        }

        return static::$instance = new Client();
    }

    /**
     * @param string $url
     * @param array $params
     * @return string
     */
    public static function get(string $url, array $params = []): string
    {
        return static::instance()->get($url, compact('params'))->getBody()->getContents();
    }

    /**
     * @param string $url
     * @param array $form_params
     * @return string
     */
    public static function post(string $url, array $form_params = []): string
    {
        return static::instance()->post($url, compact('form_params'))->getBody()->getContents();
    }

    /**
     * @param string $url
     * @param array $query
     * @return mixed
     * @throws \InvalidArgumentException if the JSON cannot be decoded.
     */
    public static function getApi(string $url, array $query = [])
    {
        return \GuzzleHttp\json_decode(static::instance()->get($url, compact('query'))->getBody()->getContents());
    }

    /**
     * @param string $url
     * @param array $form_params
     * @return mixed
     * @throws \InvalidArgumentException if the JSON cannot be decoded
     */
    public static function postApi(string $url, array $form_params = [])
    {
        return \GuzzleHttp\json_decode(static::instance()->get($url, compact('form_params'))->getBody()->getContents());
    }
}
