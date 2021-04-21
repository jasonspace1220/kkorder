<?php

namespace lib\CalOrder;

/** 
 * CalOrderTypeA 滿六杯 最便宜那杯免費 滿12杯 最便宜那兩杯免費 的優惠邏輯計算訂單價值
 */
class CalOrderTypeA implements CalOrderInterface
{
    public function countByArray(array $input): int
    {
        $result = 0;

        //取得優惠杯數
        $offerQuantity = $this->getOfferQuantity($input);

        for ($x = 0; $x < $offerQuantity; $x++) {
            //找出訂單中 最便宜的那杯 移出訂單陣列
            $index = array_search(min($input), $input);
            unset($input[$index]);
        }

        $result = array_sum($input);

        return $result;
    }

    /**
     * getOfferQuantity 取得優惠數量
     * 滿6杯 1杯免費 所以除以6
     *
     * @return void
     */
    public function getOfferQuantity($input)
    {
        $ordersCount = count($input);

        return floor($ordersCount / 6);
    }
}
