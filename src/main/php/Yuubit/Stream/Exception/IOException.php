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
    public function __construct($errorMessage, $errorCode = 0, Throwable $previous = null)
    {
        parent::__construct($errorMessage, $errorCode, $previous);
    }
}