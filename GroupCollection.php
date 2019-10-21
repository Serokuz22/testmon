<?php
/**
 * Коллекция Группы
 * @author Kurianov S.A. <massivbarn@gmail.com>
 * @package Collection
 * @version 1.0.0
 */

include_once 'Collection.php';

include_once 'Models\GroupModel.php';

class GroupCollection extends Collection
{
    /**
     * @param string $str
     */
    public function add(string $str)
    {
        $item = new GroupModel();
        $item->setForString($str);
        $this->data[] =$item;
    }

    /**
     * Выбираем по родителю
     * @param int $parentId
     * @return array
     */
    public function getParenId(int $parentId)
    {
        $result = [];

        foreach ($this->data as $item)
        {
            if($item->parent_id == $parentId)
            {
                $result[] = $item;
            }
        }
        return $result;
    }
}
