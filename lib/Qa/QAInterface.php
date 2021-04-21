<?php
namespace lib\Qa;

interface QAInterface{
    
    /**
     * qa 顯示問題並取得結果
     *
     * @param  mixed $question
     * @return string
     */
    public function qa(string $question) : string;

    /**
     * startQa 開始問答並取得回答結果
     *
     * @return array
     */
    public function startQa() : array;

}