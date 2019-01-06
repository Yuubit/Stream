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

class Stream implements IOutputStream
{
    /**
     * @var mixed
     */
    private $stream;
    protected $errorCode;
    protected $errorMsg;

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

    function getErrorCode(): int
    {
        return $this->errorCode;
    }

    function getErrorMessage(): string
    {
        return $this->errorMsg;
    }

    /**
     * {@inheritdoc}
     */
    function write(array $buffer)
    {
        //maybe try with (string)$buffer instead of implode()
        if (fwrite($this->stream, implode("", $buffer)) === false) {
            $this->errorCode = error_get_last()['type'];
            $this->errorMsg = error_get_last()['message'];

            throw new IOException($this);
        }
    }
}