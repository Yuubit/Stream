<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/6/19
 * Time: 10:36 PM
 */

namespace Yuubit\Stream;


interface IStreamReader extends IEndable
{
    /**
     * Reads a line as text.
     * @return string
     */
    function readLine(): string;
}