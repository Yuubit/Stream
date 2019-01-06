<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 2:35 PM
 */

namespace Yuubit\Stream\Input;


use PHPUnit\Framework\TestCase;
use Yuubit\Stream\IInputStream;

class StreamTest extends TestCase
{
    const URI = "http://www.google.com:80";

    /**
     * @var IInputStream
     */
    private $stream;

    protected function setUp()
    {
        $this->stream = new InputStream(
            fopen(self::URI, "r", false, stream_context_create([
                'https' => [
                    'method' => "GET"
                ]
            ]))
        );
    }

    function testReadBytes()
    {
        $buff = $this->stream->readBytes(1024);
        $string = implode("", $buff);
        self::assertStringStartsWith("<!doctype html>", $string);
    }
}