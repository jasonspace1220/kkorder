<?php

namespace lib\KkInterView;

use lib\Qa\QA;
use lib\Menu\Menu;
use lib\Menu\Ingredients;
use lib\Menu\MenuInterface;
use lib\Valid\QaValid;
use lib\ConvertTrait;
use lib\CalOrder\CalOrderTypeA;
use lib\CalOrder\CalOrderInterface;


class KkInterView
{
    protected $menuDatas;
    protected $ingredientsDatas;
    protected $menu;
    protected $ingredients;
    protected $qaValid;
    protected $qa;

    public function __construct()
    {
        $this->ingredientsDatas = $this->defaultData('ingredients');
        $this->menuDatas = $this->defaultData('menu');
        $this->menu = new Menu;
        $this->ingredients = new Ingredients;
        $this->setMenu($this->menu, $this->menuDatas);
        $this->setMenu($this->ingredients, $this->ingredientsDatas);
        $this->qaValid = new QaValid($this->menu->getNameSizeList(), $this->ingredients->getNameList());
        $this->qa = new QA($this->qaValid, "請輸入訂單 : ");
    }

    public function run()
    {
        //取得訂單
        $ordersArray = $this->qa->startQa();
        //將訂單轉為價錢
        $ordersPriceArray = ConvertTrait::getEachOrderPrice($ordersArray, $this->menu, $this->ingredients);

        $cal = new CalOrderTypeA;
        
        $result = $cal->countByArray($ordersPriceArray);

        return $result;
    }



    /**
     * setMenu 設定訂單
     *
     * @param  mixed $menu
     * @param  mixed $menuDatas
     * @return void
     */
    private function setMenu(MenuInterface $menu, $menuDatas)
    {
        foreach ($menuDatas as $v) {
            $menu->addItem($v);
        }
    }

    /**
     * defaultData 取得預設資料
     *
     * @param  mixed $type
     * @return void
     */
    private function defaultData($type)
    {
        switch ($type) {
            case 'ingredients':
                return [
                    [
                        "name" => "椰果",
                        "price" => 5
                    ],
                    [
                        "name" => "珍珠",
                        "price" => 5
                    ],
                    [
                        "name" => "仙草",
                        "price" => 10
                    ],
                    [
                        "name" => "布丁",
                        "price" => 10
                    ],
                ];

            default:
                return [
                    [
                        "name" => "綠茶",
                        "size" => "M",
                        "price" => 15
                    ],
                    [
                        "name" => "綠茶",
                        "size" => "L",
                        "price" => 20
                    ],
                    [
                        "name" => "烏龍",
                        "size" => "M",
                        "price" => 25
                    ],
                    [
                        "name" => "烏龍",
                        "size" => "L",
                        "price" => 30
                    ],
                    [
                        "name" => "奶茶",
                        "size" => "M",
                        "price" => 40
                    ],
                    [
                        "name" => "奶茶",
                        "size" => "L",
                        "price" => 50
                    ],
                    [
                        "name" => "水果茶",
                        "size" => "M",
                        "price" => 50
                    ],
                    [
                        "name" => "水果茶",
                        "size" => "L",
                        "price" => 60
                    ],
                ];
        }
    }
}
