<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 1:22 PM
 */

namespace Yuubit\Stream;


interface IInputStream extends IClosable, IEndable, IInspectable
{
    /**
     * Reads specified number of bytes into an array.
     * @param int $bytes The amount of bytes to be read
     * @return array
     */
    function readBytes($bytes);

    /**
     * Reads only the next character.
     * @return string
     */
    function readChar();
}