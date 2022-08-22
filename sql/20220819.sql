--加總
SELECT  SUM(`price`) FROM `products` WHERE sid IN (2,3); --900
SELECT  SUM(`price`) FROM `order_details` WHERE `order_sid`=11; --690+650=1340
SELECT SUM(`price`*`quantity`) FROM `order_details` WHERE `order_sid`=11; --690*2+650=2030

--群組 group by以哪個欄位作群組（相同的會被刷掉）
SELECT * FROM `products` GROUP BY `category_sid`;
SELECT `category_sid` FROM `products` GROUP BY `category_sid`;  --MYSQL8
SELECT *, COUNT(1) num FROM `products` GROUP BY `category_sid`;  --MYSQL8無法執行
-- GROUP BY通常會搭配COUNT使用 各分類有幾筆產品
SELECT `category_sid`, COUNT(1) FROM `products` GROUP BY `category_sid`;

--拿到分類、分類名稱、筆數
SELECT 
    p.`category_sid`, 
    c.`name`分類名稱,
     COUNT(1)筆數
    FROM `products` p
    JOIN`categories` c
        ON p.`category_sid`=c.`sid`
    GROUP BY p.`category_sid`;


--老師demo為空值NULL ＊＊如果設設外鍵關聯 就看不出差別 ＊＊
SELECT 
    p.`category_sid`, 
    c.`name`分類名稱,
     COUNT(1)筆數
    FROM `products` p
    LEFT JOIN`categories` c
        ON p.`category_sid`=c.`sid`
    GROUP BY p.`category_sid`;


--標籤 一個商品可以對應到多個標籤 一個標籤可以對應到多個商品 
--分類 一個商品只能對到一個分類 不會對到兩個分類

--多對多（三張表）

--產品分類表格(品分類表格不會看到標籤)
--產品對應表格（設定外鍵）
--標籤表格


--取得某筆訂單明細
SELECT o.*,od.price,od.quantity,p.bookname FROM `orders` o
	JOIN `order_details` od ON o.sid=od.order_sid
	JOIN `products` p ON od.product_sid=p.sid
	WHERE o.sid = 11;   --指定某一筆訂單


--取得某個會員所有訂單明細
SELECT o.*,od.price,od.quantity,p.bookname FROM `orders` o
	JOIN `order_details` od ON o.sid=od.order_sid
	JOIN `products` p ON od.product_sid=p.sid
	WHERE o.member_sid = 1;   --指定某一個會員

--某一天的訂單
SELECT * FROM `orders` WHERE 
	`order_date`> '2016-03-25'
    AND
    `order_date`< '2016-03-26';

--錯誤寫法 時間一定要至少是年月日格式 不然會被判斷為數值
SELECT * FROM `orders` WHERE 
	`order_date`> '2016'
    AND
    `order_date`< '2017';
--錯誤寫法
SELECT * FROM `orders` WHERE 
    `order_date`> '2016-03'
    AND
    `order_date`< '2016-04'

--正確寫法，三月份的訂單
SELECT * FROM `orders` WHERE 
    `order_date`>= '2016-03-01'
    AND
    `order_date`< '2016-04-01';

--某一小時內的訂單
SELECT * FROM `orders` WHERE 
    `order_date`>= '2016-03-25 12:00:00'
    AND
    `order_date`< '2016-03-25 13:00:00';
--查到兩筆


--子查詢  所有子查詢都要用小括號包起來 但不可以有; 系統會以為結束了
SELECT `product_sid` FROM `order_details` WHERE `order_sid` = 11;

SELECT * FROM `products` WHERE `sid` IN
(
	SELECT `product_sid`
    FROM `order_details`
    WHERE `order_sid` = 11
);

-- *代表所有欄位（訂購明細有好幾個col） 所以會出錯
SELECT * FROM `products` WHERE `sid` IN
(
	SELECT *
    FROM `order_details`
    WHERE `order_sid` = 11
);


SELECT 
    p.*, 
    od.quantity, 
    od.price od_price --別名
FROM `products` p 
JOIN 
( SELECT* FROM `order_details` WHERE `order_sid` = 11 
)od --od只是別名 但子查詢一定要給別名不然會語法錯誤
ON p.sid=od.product_sid;

--VIEW建立檢視表
CREATE VIEW product_cate_view AS
SELECT p.*, c.`name`分類名稱 FROM `products` p
    JOIN `categories` c 
    ON p.category_sid = c.sid;