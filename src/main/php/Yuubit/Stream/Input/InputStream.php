<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 4:41 PM
 */

namespace Yuubit\Stream\Input;


use Yuubit\Stream\Exception\IOException;
use Yuubit\Stream\IPointable;
use Yuubit\Stream\IBufferable;
use Yuubit\Stream\IClosable;
use Yuubit\Stream\IEndable;
use Yuubit\Stream\IInputStream;
use Yuubit\Stream\IInspectable;
use Yuubit\Stream\IOutputStream;

/**
 * Class Stream
 * @package Yuubit\Stream\Input
 */
class InputStream implements IInputStream
{
    protected $stream;

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
     * {@inheritdoc}
     */
    public function end()
    {
        return feof($this->stream);
    }

    /**
     * {@inheritdoc}
     */
    function readBytes(int $bytes): array
    {
        if(($received = fread($this->stream, $bytes)) === false) {
            throw new IOException(error_get_last()['message'], error_get_last()['type']);
        }

        if($this->getMeta()['timed_out']) {
            throw new IOException("Timed Out!", 1);
        }

        return str_split($received, 1);
    }

    function readChar(): string
    {
        return $this->readBytes(1)[0];
    }

    /**
     * Gives you metadata in form of an array.
     * @return array
     */
    function getMeta(): array
    {
        return stream_get_meta_data($this->stream);
    }
}