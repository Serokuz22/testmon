<?php
/**
 * Коллекция Продукты
 * @author Kurianov S.A. <massivbarn@gmail.com>
 * @package Collection
 * @version 1.0.0
 */

include_once 'Collection.php';

include_once 'Models\ProductModel.php';

class ProductCollection extends Collection
{
    /**
     * @param string $str
     */
    public function add(string $str)
    {
        $item = new ProductModel();
        $item->setForString($str);
        $this->data[] =$item;
    }

    /**
     * Выбираем по категории
     * @param int $categoryId
     * @return array
     */
    public function getCategoryId(int $categoryId)
    {
        $result = [];

        foreach ($this->data as $item)
        {
            if($item->category_id == $categoryId)
            {
                $result[] = $item;
            }
        }
        return $result;
    }
}
