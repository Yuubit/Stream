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

class InputStream implements IInputStream
{

    protected $stream;

    protected $errorMessage;

    protected $errorCode;

    protected static $readableModes = array(
        'r', 'r+', 'w+', 'a+', 'x+', 'c+', 'rb', 'r+b', 'w+b', 'a+b', 'x+b', 'c+b', 'rt', 'r+t', 'w+t', 'a+t', 'x+t', 'c+t'
    );

    /**
     * AbstractStream constructor.
     * @param $stream
     */
    public function __construct($stream)
    {
        $this->stream = $stream;
        $this->validate();
    }

    private function validate() {
        if(!in_array($this->getMeta()['mode'], self::$readableModes)) {
            $this->errorCode = 2;
            $this->errorMessage = "Non readable InputStream with mode: " . $this->getMeta()['mode'];

            throw new IOException($this);
        }
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

        if($this->getMeta()['timed_out']) {
            $this->errorCode = 1;
            $this->errorMessage = "Timed Out!";

            throw new IOException($this);
        }

        return str_split($received, 1);
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