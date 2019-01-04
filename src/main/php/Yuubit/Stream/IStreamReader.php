<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 1:23 PM
 */

namespace Yuubit\Stream;


interface IStreamReader extends IClosable, IEvaluatable
{
    function readLine(): string;
    function readAll(): string;
}