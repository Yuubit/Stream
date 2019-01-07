<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/7/19
 * Time: 11:58 AM
 */

namespace Yuubit\Stream;


interface IStreamWriter
{
    function writeLine(string $line);
    function writeChar(string $char);
}