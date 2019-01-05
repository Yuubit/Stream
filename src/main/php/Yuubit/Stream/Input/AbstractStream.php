<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/4/19
 * Time: 4:41 PM
 */

namespace Yuubit\Stream\Input;


use Yuubit\Stream\Exception\IOException;
use Yuubit\Stream\IInputStream;

abstract class AbstractStream implements IInputStream
{

    protected $stream;

    protected $errorMessage;

    protected $errorCode;

    /**
     * AbstractStream constructor.
     * @param $stream
     */
    public function __construct($stream, $timeout = 30)
    {
        $this->stream = $stream;
        stream_set_timeout($this->stream, $timeout);
    }

    function close()
    {
        fclose($this->stream);
    }

    function getErrorCode(): int
    {
        return $this->errorCode;
    }

    function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * {@inheritdoc}
     */
    public function end(): bool
    {
        return feof($this->stream);
    }

    /**
     * {@inheritdoc}
     */
    function read(int $bytes): array
    {
        if(($received = fread($this->stream, $bytes)) === false) {
            $this->errorCode = error_get_last()['type'];
            $this->errorMessage = error_get_last()['message'];

            throw new IOException($this);
        }

        return str_split($received, 1);
    }
}