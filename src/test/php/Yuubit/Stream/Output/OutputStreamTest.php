<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/5/19
 * Time: 6:49 PM
 */

namespace Yuubit\Stream\Output;


use PHPUnit\Framework\TestCase;
use Yuubit\Stream\Exception\IOException;
use Yuubit\Stream\IOutputStream;

class OutputStreamTest extends TestCase
{
    /**
     * @var IOutputStream
     */
    private $outputStream;

    private $data = ['a', 'b', 'c'];

    private $handle;

    private $filename;

    protected function setUp()
    {
        $this->handle = tmpfile();
        $meta = stream_get_meta_data($this->handle);
        $this->filename = $meta["uri"];
        $this->outputStream = new OutputStream($this->handle);
    }

    function testWrite()
    {
        $this->outputStream->writeBytes($this->data);
        $contents = file_get_contents($this->filename);

        //tmpfile is deleted on close so close afterwards.
        $this->outputStream->close();

        self::assertEquals("abc", $contents);
    }

}