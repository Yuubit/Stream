<?php
/**
 * Created by IntelliJ IDEA.
 * User: anonymous
 * Date: 1/5/19
 * Time: 8:16 PM
 */

namespace Yuubit\Stream\Output;


use Yuubit\Stream\Exception\IOException;
use Yuubit\Stream\IInputStream;
use Yuubit\Stream\IOutputStream;

class OutputStream implements IOutputStream
{
    /**
     * @var mixed
     */
    private $stream;

    protected $bufferSize;

    /**
     * AbstractStream constructor.
     * @param $stream
     */
    public function __construct($stream)
    {
        $this->stream = $stream;
    }

    function close()
    {
        fclose($this->stream);
    }

    /**
     * Gives you metadata in form of an array.
     * @return array
     */
    function getMeta()
    {
        return stream_get_meta_data($this->stream);
    }

    /**
     * Write onto output stream.
     * @param $buffer array Output buffer
     * @return void
     * @throws IOException
     */
    function writeBytes($buffer)
    {
        //maybe try with (string)$buffer instead of implode()
        if (fwrite($this->stream, implode("", $buffer)) === false) {
            throw new IOException(error_get_last()['message'], error_get_last()['type']);
        }
    }
}