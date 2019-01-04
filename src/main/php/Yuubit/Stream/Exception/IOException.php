<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 2:12 PM
 */

namespace Yuubit\Stream\Exception;


use Exception;
use Throwable;
use Yuubit\Stream\IEvaluatable;

class IOException extends Exception
{
    public function __construct(IEvaluatable $stream, Throwable $previous = null)
    {
        parent::__construct($stream->getErrorMessage(), $stream->getErrorCode(), $previous);
    }
}