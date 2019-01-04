<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 5:08 PM
 */

namespace Yuubit\Stream;


use Yuubit\Stream\Input\FileStream;
use Yuubit\Stream\Input\HTTPStream;
use Yuubit\Stream\Input\SocketStream;
use Yuubit\URI\URI;

class StreamFactory
{
    public static function createInputStream(URI $uri): IInputStream {
        switch ($uri->getScheme()) {
            case "http":
            case "https":
                return new HTTPStream($uri);
            case "tcp":
            case "udp":
                return new SocketStream($uri);
            default:
                return new FileStream($uri);
        }
    }
}