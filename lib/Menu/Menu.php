<?php

namespace lib\Menu;

use lib\Menu\BaseMenu;

class Menu extends BaseMenu
{
    public function getSizeList()
    {
        $list = [];

        foreach ($this->menu as $item) {
            array_push($list, $item['size']);
        }

        return array_unique($list);
    }

    public function getNameSizeList()
    {
        $list = [];

        foreach ($this->menu as $item) {
            array_push($list, $item['name'].$item['size']);
        }

        return array_unique($list);
    }

    public function getPrice($itemArray)
    {
        foreach ($this->menu as $item) {
            if ($item['name'] == $itemArray['name'] && $item['size'] == $itemArray['size']) {
                return $item['price'];
            }
        }

        return 0;
    }
}
