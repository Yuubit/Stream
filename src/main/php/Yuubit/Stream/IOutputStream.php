<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 1:23 PM
 */

namespace Yuubit\Stream;


use Yuubit\Stream\Exception\IOException;

interface IOutputStream extends IClosable, IInspectable
{
    /**
     * Write onto output stream.
     * @param $buffer array Output buffer
     * @return void
     * @throws IOException
     */
    function writeBytes($buffer);
}