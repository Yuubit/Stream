<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 5:08 PM
 */

namespace Yuubit\Stream;

use Yuubit\Stream\Input\InputStream;
use Yuubit\URI\URI;

class StreamFactory
{
    public static function createInputStream(URI $uri): IInputStream
    {
        switch ($uri->getScheme()) {
            case "http":
            case "https":
                return self::createHttpInputStream($uri);
            default:
                return self::createFileInputStream($uri);
        }
    }

    private static function createHttpInputStream(URI $uri)
    {
        $context = stream_context_create([
            'http' => [
                'method' => "GET"
            ]
        ]);

        return new InputStream(fopen((string)$uri, "r", false, $context));
    }

    private static function createFileInputStream(URI $uri)
    {
        return new InputStream(fopen((string)$uri, "r", false));
    }
}