<?php

namespace App\Services\FileProcessing\Input;

use Box\Spout\Reader\ReaderInterface;
use League\Flysystem\AdapterInterface;

abstract class FileReader
{
    protected $file_path;

    protected $headers = null;

    /**
     * FileReader constructor.
     * @param $file_path
     */
    public function __construct($file_path)
    {
        $this->file_path = $file_path;
    }

    /**
     * @param bool $skipHeaders
     * @return array
     * @throws \Box\Spout\Common\Exception\IOException
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     * @throws \Box\Spout\Reader\Exception\ReaderNotOpenedException
     */
    public function read($skipHeaders = true)
    {
        /** @var ReaderInterface $reader */
        $reader = $this->getReader();
        $reader->open($this->file_path);

        $rows = [];
        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $k => $row) {
                $row = $this->parse($row);
                if ($skipHeaders && $k == 1) {
                    $this->headers = $row;
                    continue;
                }

                $rows[] = $this->setKeyToRows($row);
            }
        }
        $reader->close();

        return $rows;
    }

    /**
     * @param $row
     * @return array
     */
    private function setKeyToRows($row)
    {
        if (is_null($this->headers)) {
            return $row;
        }

        $res = [];
        for ($i = 0; $i < count($row); $i++) {
            $res[$this->headers[$i]] = $row[$i];
        }

        return $res;
    }

    /**
     * @param array $row
     * @return array
     */
    abstract protected function parse($row);

    /**
     * @return ReaderInterface
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     */
    abstract public function getReader();

}
