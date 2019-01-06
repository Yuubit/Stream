<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/5/19
 * Time: 5:09 PM
 */

namespace Yuubit\Stream\Reader;


use PHPUnit\Framework\TestCase;
use Yuubit\Stream\Input\InputStream;
use Yuubit\Stream\IStreamReader;

class BufferedStreamReaderTest extends TestCase
{
    const URI = "https://www.google.com";

    /**
     * @var IStreamReader
     */
    private $reader;

    private $inputStream;

    protected function setUp()
    {
        $this->inputStream = new InputStream(
            fopen(self::URI, "r", false, stream_context_create([
                'https' => [
                    'method' => "GET"
                ]
            ]))
        );

        $this->reader = new BufferedStreamReader($this->inputStream);
    }


    function testReadLine()
    {
        self::assertStringStartsWith("<!doctype html>", $this->reader->readLine());
    }
}