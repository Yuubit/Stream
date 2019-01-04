<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 1:23 PM
 */

namespace Yuubit\Stream;


interface IOutputStream extends IClosable, IEvaluatable
{
    /**
     * @param $buffer array Output buffer
     * @return void
     */
    function write(array &$buffer);
}