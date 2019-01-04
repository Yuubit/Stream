<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 1:24 PM
 */

namespace Yuubit\Stream\Input;


use Yuubit\Stream\Exception\IOException;
use Yuubit\Stream\IInputStream;
use Yuubit\Tokenizer\IStream;
use Yuubit\Tokenizer\Token;
use Yuubit\URI\URI;

class SocketStream extends AbstractStream
{
    /**
     * @var URI
     */
    protected $uri;

    public function __construct(URI $uri, $timeout = 30, $opts = null)
    {
        $this->uri = $uri;
        parent::__construct(fopen((string) $this->uri, "r", false, stream_context_create($opts)), $timeout);
    }
}