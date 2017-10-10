<?php

use Illuminate\Support\Carbon;
use League\CommonMark\CommonMarkConverter;

if (!function_exists('carbon')) {
    /**
     * Return an instance of carbon.
     *
     * @param  mixed $params
     * @param  mixed $tz
     * @return Illuminate\Support\Carbon
     */
    function carbon($params = null, $tz = null)
    {
        return new Carbon($params, $tz);
    }
}

if (!function_exists('bluprint')) {
    /**
     * Return a bluprint config value.
     *
     * @param  string $key
     * @param  mixed $default
     * @return mixed
     */
    function bluprint($key, $default = null)
    {
        return config('bluprint.'.$key, $default);
    }
}

if (!function_exists('markdownTrans')) {
    function markdownTrans($key)
    {
        return with(new CommonMarkConverter)->convertToHtml(
            trans($key)
        );
    }
}