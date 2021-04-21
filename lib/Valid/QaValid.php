<?php

namespace lib\Valid;

class QaValid implements ValidInterface
{

    protected $menuNameSizeList;
    protected $ingredientsNameList;

    public function __construct($menuNameSizeList,  $ingredientsNameList)
    {
        $this->menuNameSizeList = $menuNameSizeList;
        $this->ingredientsNameList = $ingredientsNameList;
    }

    public function valid($inputArray)
    {
        if (!$this->format($inputArray)) {
            return "訂單格式錯誤";
        }

        if (!$this->checkMenuItem($inputArray)) {
            return "訂單品項不存在";
        }

        if (!$this->checkIngredients($inputArray)) {
            return "訂單配料不存在";
        }

        return true;
    }

    protected function format($inputArray)
    {
        if (isset($inputArray["name"]) && isset($inputArray["size"])) {
            return true;
        }

        return false;
    }

    protected function checkMenuItem($inputArray)
    {
        $item = $inputArray["name"] . $inputArray["size"];

        if (!in_array($item, $this->menuNameSizeList)) {
            return false;
        }

        return true;
    }

    protected function checkIngredients($inputArray)
    {
        foreach ($inputArray["ingredients"] as $v) {

            $item = str_replace("+", "", $v);

            if (!in_array($item, $this->ingredientsNameList)) {
                return false;
            }
        }

        return true;
    }
}
