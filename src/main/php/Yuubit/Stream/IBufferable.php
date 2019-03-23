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
    /**
     * @param int $size
     * @return void
     */
    function setBufferSize($size);

    /**
     * @return int
     */
    function getBufferSize();

    /**
     * @return void
     */
    function flush();
}