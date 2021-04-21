<?php

namespace lib;
use lib\Menu\MenuInterface;

trait ConvertTrait
{
    public $MENU_NAME_INDEX = 0;
    public $MENU_SIZE_INDEX = 1;

    public function inputToArray($inputString)
    {
        $result = [
            "name" => null,
            "size" => null,
            "ingredients" => []
        ];

        $inputArray = explode(",", $inputString);

        foreach ($inputArray as $key => $value) {

            if ($key == $this->MENU_NAME_INDEX) {
                $result["name"] = $value;
                continue;
            }

            if ($key == $this->MENU_SIZE_INDEX) {
                $result["size"] = $value;
                continue;
            }

            $item = str_replace("+", "", $value);
            
            array_push($result["ingredients"], $item);
        }

        return $result;
    }

    /**
     * getEachOrderPrice 取得每張訂單的價錢
     *
     * @return void
     */
    static function getEachOrderPrice($orders, MenuInterface $menu, MenuInterface $ingredients)
    {
        $result = [];

        foreach ($orders as $order) {
            $menuPrice = $menu->getPrice($order);

            $ingredientsPrice = 0;

            foreach ($order["ingredients"] as $ing) {
                $ar = ["name" => $ing];
                $ingredientsPrice += $ingredients->getPrice($ar);
            }

            $price = $menuPrice + $ingredientsPrice;

            array_push($result,$price);
        }

        return $result;
    }
}
