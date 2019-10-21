<?php
/**
 * Коллекция
 * @author Kurianov S.A. <massivbarn@gmail.com>
 * @package Collection
 * @version 1.0.0
 */

abstract class Collection
{
    /**
     * @var array
     */
    public $data = [];

    /**
     * @param string $str
     */
    public function add(string $str){}

    /**
     * @param string $filename
     */
    public function load(string $filename)
    {
        if (!is_readable($filename))
        {
            die($filename . ' - NOT FOUND');
        }
        $i=0;
        if ($fh = fopen($filename, "r"))
        {
            while (!feof($fh))
            {
                $str = fgets($fh, 9999);
                if($i>0) $this->add($str);
                $i++;
            }
            fclose($fh);
        }
    }
}

