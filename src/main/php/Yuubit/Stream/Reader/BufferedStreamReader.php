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
     * @var array;
     */
    private $buffer;

    private $pos = 0;

    /**
     * BufferedStreamReader constructor.
     * @param IInputStream $inputStream
     * @param int $bufferSize
     */
    public function __construct(IInputStream $inputStream, $bufferSize = 1024)
    {
        $this->inputStream = $inputStream;
        $this->bufferSize = $bufferSize;
    }

    /**
     * @{inheritdoc}
     */
    function readLine()
    {
        if(!empty($this->buffer)) {
            if(($nextEOL = strpos(($data = implode("", $this->buffer)), PHP_EOL, $this->pos)) !== false) {
                $line = substr($data, $this->pos, $nextEOL);
                $this->pos = $nextEOL;

                return $line;
            }
        }

        $line = "";

        while (
            strpos(($data = implode("", ($this->buffer = $this->inputStream->readBytes($this->bufferSize)))), PHP_EOL) === false &&
            !$this->inputStream->end()
        ) {
            $line .= $data;
        }

        $line .= str_split($data, strpos($data, PHP_EOL))[0];

        return $line;
    }

    /**
     * {@inheritdoc}
     */
    public function end(): bool
    {
        return $this->inputStream->end();
    }
}