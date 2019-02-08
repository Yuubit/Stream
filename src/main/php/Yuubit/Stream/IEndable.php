<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/5/19
 * Time: 7:21 PM
 */

namespace Yuubit\Stream;


interface IEndable
{
    /**
     * Determines whether something (probably a stream) has reached its end.
     * @return bool True when the end was reached false if not.
     */
    public function end();
}