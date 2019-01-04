<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 2:27 PM
 */

namespace Yuubit\Stream\Input;


use Yuubit\Stream\IInputStream;

class FileStream implements IInputStream
{

    function close()
    {
        // TODO: Implement close() method.
    }

    function getErrorCode(): int
    {
        // TODO: Implement getErrorCode() method.
    }

    function getErrorMessage(): string
    {
        // TODO: Implement getErrorMessage() method.
    }

    /**
     * @param array $buffer
     * @return void
     */
    function read(array &$buffer)
    {
        // TODO: Implement read() method.
    }
}