<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/5/19
 * Time: 6:49 PM
 */

namespace Yuubit\Stream\Output;


use PHPUnit\Framework\TestCase;
use Yuubit\Stream\Output\SocketStream;

class SocketStreamTest extends TestCase
{
    const URL = "tcp:google.de";

    //TODO: Try to open output and input socket and write from input to output

    private $outputStream;

    private $inputStream;

    protected function setUp()
    {
        $this->outputStream = new SocketStream()
    }

    function testWrite(){
        $stream = new HTTPOutputStream;

    }

}