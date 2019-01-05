<?php
/**
 * Created by IntelliJ IDEA.
 * User: felix
 * Date: 1/5/19
 * Time: 4:35 PM
 */

namespace Yuubit\Stream\Reader;


use Yuubit\Stream\IInputStream;
use Yuubit\Stream\IStreamReader;

class BufferedStreamReader implements IStreamReader
{

    /**
     * @var IInputStream
     */
    private $inputStream;

    /**
     * @var int
     */
    private $bufferSize;

    /**
     * @var string;
     */
    private $tmp;

    /**
     * BufferedStreamReader constructor.
     * @param IInputStream $inputStream
     * @param int $bufferSize
     */
    public function __construct(IInputStream $inputStream, int $bufferSize = 1024)
    {
        $this->inputStream = $inputStream;
        $this->bufferSize = $bufferSize;
    }

    function close()
    {
        $this->inputStream->close();
    }

    function getErrorCode(): int
    {
        $this->inputStream->getErrorCode();
    }

    function getErrorMessage(): string
    {
        $this->inputStream->getErrorMessage();
    }

    function readLine(): string
    {
        while(strpos($this->tmp, PHP_EOL)) {
            $this->tmp .= implode("", $this->inputStream->read($this->bufferSize));
        }

        return explode(PHP_EOL, $this->tmp)[0];
    }

    function readAll(): string
    {
        while(!$this->end()) {
            $this->readLine();
        }

        return $this->tmp;
    }

    /**
     * Determines whether something (probably a stream) has reached its end.
     * @return bool True when the end was reached false if not.
     */
    public function end(): bool
    {
        return $this->inputStream->end();
    }
}