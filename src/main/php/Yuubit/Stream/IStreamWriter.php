<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 1:23 PM
 */

namespace Yuubit\Stream;


interface IStreamWriter extends IClosable, IEvaluatable
{
    function writeLine(string $line);
    function writeAll(string $text);
}