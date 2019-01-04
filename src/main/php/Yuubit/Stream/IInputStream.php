<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 1:22 PM
 */

namespace Yuubit\Stream;


interface IInputStream extends IClosable, IEvaluatable
{
    /**
     * @param int $bytes The amount of bytes to be read
     * @return array
     */
    function read(int $bytes): array;
}