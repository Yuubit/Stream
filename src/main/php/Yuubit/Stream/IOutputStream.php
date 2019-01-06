<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 1:23 PM
 */

namespace Yuubit\Stream;


use Yuubit\Stream\Exception\IOException;

interface IOutputStream
{
    /**
     * Write onto output stream.
     * @param $buffer array Output buffer
     * @return void
     * @throws IOException
     */
    function writeBytes(array $buffer);

    function writeLine(string $line);

    function writeChar(string $char);

}