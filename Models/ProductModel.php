<?php
/**
 * Модель Продукт
 * @author Kurianov S.A. <massivbarn@gmail.com>
 * @package Models
 * @version 1.0.0
 */
include_once 'Model.php';

class ProductModel extends Model
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var int
     */
    public $category_id;
    /**
     * @var string
     */
    public $name;
    /**
     * @var int
     */
    public $cena;

    /**
     * Рабираем строку на поля
     * @param string $str
     */
    public function setForString(string $str)
    {
        $fields = explode(";",$str);

        $this->id = intval($fields[0]);
        $this->category_id = intval($fields[1]);
        $this->name = $fields[2];
        $this->cena = intval($fields[3]);
    }

    /**
     * Форматируем по шаблону
     * @param string $format
     * @return string
     */
    public function formattedString(string $format)
    {
        $format = str_replace('%наименование%',$this->name,$format);
        $format = str_replace('%name%',$this->name,$format);
        $format = str_replace('%цена%',$this->cena,$format);

        return $format;
    }
}
