<?php
/**
 * Контроллер.
 * @author Kurianov S.A. <massivbarn@gmail.com>
 * @package App
 * @version 1.0.0
 */
include 'GroupCollection.php';
include 'ProductCollection.php';

class App
{
    /**
     * @var GroupCollection
     */
    public $groupCollection;
    /**
     * @var ProductCollection
     */
    public $productCollection;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->groupCollection = new GroupCollection();
        $this->productCollection = new ProductCollection();
    }

    /**
     * Выводим группу и её содержимое
     * @param GroupModel $group
     * @param string $format
     */
    public function viewOneGroup(GroupModel $group, string $format)
    {
?>
	<li>
		<h1>
<?php
    echo $group->name;
?>        </h1><?php

        $products = $this->productCollection->getCategoryId($group->id);

        if($group->inherit)
            $format = $group->format;

?>        <ul><?php
        foreach ($products as $product)
        {
              $this->viewProduct($product,$format);
        }

        $groups = $this->groupCollection->getParenId($group->id);
        foreach ($groups as $grp)
        {
                $this->viewOneGroup($grp,$format);
        }
?>        </ul><?php
?>        </li><?php

    }

    /**
     * Выводим продукт
     * @param ProductModel $product
     * @param string $format
     */
    public function viewProduct(ProductModel $product, string $format)
    {
        echo '<li><b>'.$product->formattedString($format).'</b></li>';
    }

    /**
     * Запускаем
     */
    public function run()
    {
        $this->groupCollection->load('group.csv');
        $this->productCollection->load('products.csv');

        $groups = $this->groupCollection->getParenId(0);

?>        <ul><?php
        foreach ($groups as $group)
        {
            $this->viewOneGroup($group,'');
        }
?>        </ul><?php
    }
}

/**
 * Создаем
 */
$app = new App();

/**
 * Выполняем
 */
$app->run();
