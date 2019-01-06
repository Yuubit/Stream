<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/6/19
 * Time: 6:39 PM
 */

namespace Yuubit\Stream;


/**
 * Interface IPointable
 * Interface to mark stream as one that has a cursor which can be moved around.
 * @package Yuubit\Stream
 */
interface IPointable
{
    const SEEK_SET = SEEK_SET;

    const SEEK_CUR = SEEK_CUR;

    const SEEK_END = SEEK_END;

    function seek(int $offset, int $whence): bool;

    function rewind(): bool;

    function tell(): int;
}