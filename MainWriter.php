<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 02.02.2019
 * Time: 15:09
 */

final class MainWriter
{
    private $fileData = 'text.txt';

    /**
     * MainWriter constructor.
     */
    public function __construct()
    {
        $this->makeFile();
    }

    private function makeFile()
    {
        if (empty(file_exists($this->fileData))) {
            $file = fopen($this->fileData, 'w');
            fwrite($file, '');
            fclose($file);
        }
    }

    /**
     * @return bool
     */
    private function removeFile()
    {
        if (!file_exists($this->fileData)) {
            return true;
        }
        unlink($this->fileData);
    }

    /**
     * @param $str
     */
    public function saveToFile($str)
    {
        if (file_exists($this->fileData)) {
            $this->makeFile();
            $file = fopen($this->fileData, 'w');
            fwrite($file, $str);
            fclose($file);
        }
    }
}