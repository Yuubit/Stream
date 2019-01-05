<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 2:27 PM
 */

namespace Yuubit\Stream\Input;


use Yuubit\Stream\IInputStream;
use Yuubit\URI\URI;

class FileStream extends AbstractStream
{
    public function __construct(URI $uri, $timeout = 30)
    {
        parent::__construct(fopen((string) $uri, "r"), $timeout);
    }
}