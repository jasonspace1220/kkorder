<?php
namespace lib\KkOrder;

interface KkOrderInterface {
        
    /**
     * 開始運行
     *
     * @return void
     */
    public function run();

    /**
     * setMenuData 設定菜單
     *
     * @return void
     */
    public function setMenuData($menuData);
    
    /**
     * setIngredientsData 設定配料
     *
     * @return void
     */
    public function setIngredientsData();
}