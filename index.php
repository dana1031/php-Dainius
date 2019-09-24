<?php
$drinks = [
    [
        'name' => 'Korona alus',
        'price_stock' => 3.6,
        'discount' => 0,
        'img' => 'https://cdn.elkor.lv/media/catalog/product/cache/0/image/9df78eab33525d08d6e5fb8d27136e95/c/o/corona_extra.jpg',
    ],
    [
        'name' => 'Stumbro degtinėla',
        'price_stock' => 11.79,
        'discount' => 5,
        'img' => 'https://static.pricer.lt/dynamic/foreign.png?image=https%3A%2F%2Fwww.iki.lt%2Fassets%2FUploads%2FAlco%2F57983.JPG',
    ],
    [
        'name' => 'Alita sampanas',
        'price_stock' => 12,
        'discount' => 3,
        'img' => 'https://www.vynomeka.lt/images/uploader/pu/putojantis-vynas-alita-classic-dry-075-l-1.jpg',
    ],
    [
        'name' => 'Likeris',
        'price_stock' => 10.6,
        'discount' => 0,
        'img' => 'http://www.duty-free.lt/out/pictures/master/product/1/655828copy.png',
    ],
];
foreach ($drinks as $drink_id => $drink) {
    $drinks[$drink_id]['price_retail'] = round($drink['price_stock'] - ($drink['price_stock'] / 100 * $drink['discount']), 2);
    if ($drinks[$drink_id]['price_retail'] < $drink['price_stock']) {
        $drinks[$drink_id]['price_class'] = 'price_bigger';
        $drinks[$drink_id]['discount_price_class'] = 'price_without_discount';
    } else {
        $drinks[$drink_id]['price_class'] = 'price';
        $drinks[$drink_id]['discount_price_class'] = 'price_regular';
    }
    $drinks[$drink_id]['in_stok'] = rand(0, 1);

     if ($drinks[$drink_id]['in_stok']) {
        $drinks[$drink_id]['stock_text'] = 'Yra sandėlyje';
        $drinks[$drink_id]['stock_class'] = 'yra_sandelyje';
    } else {
        $drinks[$drink_id]['stock_text'] = 'Nėra sandėlyje';
        $drinks[$drink_id]['stock_class'] = 'nera_sandelyje';
    }
}

var_dump($drinks);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <style>
            img {  
                height: 200px;
                width: 120px;
                background-position: center;
                background-size: cover;
                margin: auto;
            }
            .container {
                position: relative;
                width: 180px;
                height: 300px;
                border: solid black 1px;
                float: left;
                margin-right: 5px;
            }
            .price {
                height: 20px;
                width: 50px;
                background-color: pink;
                color: white;
                position: absolute;
                top: 0px;
                left: 70px;
/*                bottom: 220px;*/

            }
            .price_bigger {
                height: 30px;
                width: 50px;
                background-color: red;
                color: white;
                position: relative;
                bottom: 220px;
                left: 130px;

            }
            .title {
                height: 20px;
                width: 80px;
                margin: auto;
                text-align: center;
            }
            .price_without_discount {
                height: 20px;
                width: 50px;
                background-color: grey;
                color: white;
                position: relative;
                bottom: 250px;
            }
            .price_regular {
                display: none;
                text-align: center;
                
                
            }
           .nera_sandelyje{
                color: red;
                text-align: center;
                height: 20px;
                width: 100px;
                margin: auto;
                margin-bottom: 30px;
                bottom: 10px;
                text-align: center;
            }
            .yra_sandelyje{
                color: green;
                height: 20px;
                width: 100px;
                margin: auto;
/*                margin-bottom: 30px;
                bottom: 10px;*/
                text-align: center;
            }

        </style>
    </head>
    <body>
        <h1>Drink catalogue</h1>
        <?php foreach ($drinks as $drink): ?>
            <div class='container'>
                <img src=<?php print $drink['img']; ?>>
                <div class="title"><?php print $drink['name']; ?> </div>
                <div class="<?php print $drink['price_class']; ?>"><?php print '€' . $drink['price_retail']; ?></div>
                <div class="<?php print $drink['discount_price_class']; ?> "><?php print'€' . $drink['price_stock']; ?> </div>
                <div class="<?php print $drink['stock_class']; ?>">
                 <?php print $drink['stock_text']; ?>
                </div>
            </div>    
         <?php endforeach; ?>
    </body>
</html>

