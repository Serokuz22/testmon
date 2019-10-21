<?php
/**
 * Модель Группа
 * @author Kurianov S.A. <massivbarn@gmail.com>
 * @package Models
 * @version 1.0.0
 */
include_once 'Model.php';

class GroupModel extends Model
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var int
     */
    public $parent_id;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $format;
    /**
     * @var bool
     */
    public $inherit;

    /**
     * Рабираем строку на поля
     * @param string $str
     */
    public function setForString(string $str)
    {
        $fields = explode(";",$str);

        $this->id = intval($fields[0]);
        $this->name = $fields[1];
        $this->parent_id = intval($fields[2]);
        $this->format = $fields[3];
        if(intval($fields[4])==1)
            $this->inherit = true;
        else
            $this->inherit = false;
    }
}
