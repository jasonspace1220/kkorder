<?php

namespace lib\Menu;

interface MenuInterface {
    
    /**
     * getMenu 取訂單
     *
     * @return void
     */
    public function getMenu();
    
    /**
     * addItem 新增菜單
     *
     * @param  mixed $item 菜單內容
     * @return void
     */
    public function addItem($item);
        
    /**
     * getNameList 取得名稱清單
     *
     * @return void
     */
    public function getNameList();
    
    /**
     * getPrice 取得物品價錢
     *
     * @param  mixed $itemArray
     * @return void
     */
    public function getPrice($itemArray);
}