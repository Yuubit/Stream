<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 4:27 PM
 */

namespace Yuubit\Stream\Input;


use Yuubit\Stream\IInputStream;
use Yuubit\URI\URI;

class HTTPStream extends SocketStream
{

    private $defaultOpts = [
        'http' => [
            'method' => "GET"
        ]
    ];

    /**
     * HTTPStream constructor.
     * @param URI $uri
     * @param int $timeout
     * @param null $flags
     * @param array $opts
     */
    public function __construct(URI $uri, $timeout = 30, $flags = null, array $opts = [])
    {
        parent::__construct($uri, $timeout, array_merge($this->defaultOpts, $opts));
    }
}