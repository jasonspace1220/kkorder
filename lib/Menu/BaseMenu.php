<?php

namespace lib\Menu;

use lib\Menu\MenuInterface;

abstract class BaseMenu implements MenuInterface
{
    protected $menu = [];

    public function getMenu()
    {
        return $this->menu;
    }

    public function addItem($item)
    {
        array_push($this->menu, $item);
    }

    public function getNameList()
    {
        $list = [];

        foreach ($this->menu as $item) {
            array_push($list, $item['name']);
        }

        return array_unique($list);
    }

    public function getPrice($itemArray)
    {
        foreach ($this->menu as $item) {
            if ($item['name'] == $itemArray['name']) {
                return $item['price'];
            }
        }

        return 0;
    }
}
