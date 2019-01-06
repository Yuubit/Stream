<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/6/19
 * Time: 6:23 PM
 */

namespace Yuubit\Stream;


interface IInspectable
{
    /**
     * Gives you metadata in form of an array.
     * @return array
     */
    function getMeta(): array;
}