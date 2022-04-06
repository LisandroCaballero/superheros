<?php

namespace App\Services\FileProcessing\Input;

use Box\Spout\Common\Type;
use Box\Spout\Reader\Common\Creator\ReaderFactory;
use League\Csv\Reader;
use League\Csv\Writer;

class CsvReader extends FileReader
{
    public function __construct($filepath)
    {
        parent::__construct($filepath);
    }


    /**
     * @return \Box\Spout\Reader\ReaderInterface
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     */
    public function getReader()
    {
        return ReaderFactory::create(Type::CSV);
    }

    /**
     * @param array $row
     * @return array
     */
    protected function parse($row)
    {
        return explode(',', $row[0]);
    }
}
