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
use Yuubit\Stream\StreamFactory;
use Yuubit\URI\URI;

class StreamTest extends TestCase
{
    const URI = "http://www.google.com:80";

    /**
     * @var IInputStream
     */
    private $stream;

    protected function setUp()
    {
        $uri = URI::fromString(self::URI);
        $this->stream = new InputStream(
            fopen(self::URI, "r", false, stream_context_create([
                'https' => [
                    'method' => "GET"
                ]
            ]))
        );
    }

    function testRead()
    {
        $buff = $this->stream->read(1024);
        $string = implode("", $buff);
        self::assertStringStartsWith("<!doctype html>", $string);
    }
}