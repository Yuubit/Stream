<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 2:13 PM
 */

namespace Yuubit\Stream;


interface IEvaluatable
{
    /**
     * @return int
     */
    function getErrorCode();

    /**
     * @return string
     */
    function getErrorMessage();
}