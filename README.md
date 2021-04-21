# kk order

## 這是一個可以自動計算飲料訂單的Lib

---
**預設飲料菜單**

<table>
<tr>
    <td>飲料菜單</td>
    <td>M</td>
    <td>L</td>
</tr>
<tr>
    <td>綠茶</td>
    <td>$15</td>
    <td>$20</td>
</tr>
<tr>
    <td>烏龍</td>
    <td>$25</td>
    <td>$30</td>
</tr>
<tr>
    <td>奶茶</td>
    <td>$40</td>
    <td>$50</td>
</tr>
<tr>
    <td>水果茶</td>
    <td>$50</td>
    <td>$60</td>
</tr>
</table>


**預設配料加購**
<table>
<tr>
    <td>配料</td>
    <td>價錢</td>
</tr>
<tr>
    <td>椰果</td>
    <td>$5</td>
</tr>
<tr>
    <td>珍珠</td>
    <td>$5</td>
</tr>
<tr>
    <td>仙草</td>
    <td>$10</td>
</tr>
<tr>
    <td>布丁</td>
    <td>$10</td>
</tr>
</table>

**預設訂單優惠**
**買 5 送 1,折抵最低價格那杯飲料**

---
**安裝方式**
```
composer require jasonspace1220/kkorder
```
---
**基礎使用教學**

```
require_once './vendor/autoload.php';

use lib\KkOrder\KkOrder;

$kk = new KkOrder();

$kk->run();
```

**執行範例**
```
input:
    綠茶,L
    烏龍,M,+椰果
    奶茶,L,+珍珠,+布丁
output:
    115
```

**後續有機會將更新能夠自訂菜單配料優惠方案的方式**