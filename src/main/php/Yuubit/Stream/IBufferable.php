<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/6/19
 * Time: 6:48 PM
 */

namespace Yuubit\Stream;


interface IBufferable
{
    function setBufferSize(int $size);
    function getBufferSize(): int;
    function flush();
}