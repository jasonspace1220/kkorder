<?php

namespace lib\CalOrder;

interface CalOrderInterface
{

    /**
     * countByArray 輸入價錢陣列並回傳總價值
     *
     * @param  mixed $input
     * @return void
     */
    public function countByArray(array $input): int;
}
