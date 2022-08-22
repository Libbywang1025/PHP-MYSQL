--累加
UPDATE `products` SET `pages`=`pages`+1 WHERE sid =1;  --原本pages欄位的值＋1 沒有設定（WHERE sid =1,）就會全部pages欄位一起改

--合併查詢
SELECT * FROM `products` JOIN `categories`;   -- 通常不會這樣用

SELECT * FROM `products` 
    JOIN `categories` 
    ON products.category_sid=`categories`.sid;   -- 一個JOIN對應一個ON ON後面放條件

SELECT `products`.*, `categories`.name  FROM `products`
    JOIN `categories` 
    ON products.category_sid=`categories`.sid;

--別名
SELECT p.*, c.`name`  FROM `products` AS p  --FROＭ表的欄位定義別名（暫時代號）
    JOIN `categories` AS c
    ON p.category_sid=c.sid;

SELECT p.*, c.`name`  FROM `products` p  --FROＭ表的欄位定義別名（暫時代號）
    JOIN `categories` c
    ON p.category_sid=c.sid;

SELECT p.*, c.`name` 分類名稱 FROM `products` p  --修改項目名稱方便查詢 但不會影響原本表格內容
    JOIN `categories` c
    ON p.category_sid=c.sid;

--left join 
--不管有沒有對到 左邊的表（products表格）內容都會出現 對應不到就會得到空值 順序有差
SELECT p.*, c.`name` 分類名稱 FROM `products` p  
    LEFT JOIN `categories` c
    ON p.category_sid=c.sid;

--categories表格的所有內容都會出現
SELECT p.*, c.`name` 分類名稱 FROM `categories` c
    LEFT JOIN `products` p 
    ON p.category_sid=c.sid;

--null
--取出某欄為空值
SELECT p.*, c.`name` 分類名稱 FROM `products` p 
    LEFT JOIN `categories` c
    ON p.`category_sid` = c.`sid`
    WHERE c.`sid` IS NULL;

-- 取出某欄不為空值
SELECT p.*, c.`name` 分類名稱 FROM `products` p 
    LEFT JOIN `categories` c
    ON p.`category_sid` = c.`sid`
    WHERE c.`sid` IS NOT NULL;

--模糊查詢 關鍵字查詢功能常用 篩選！！！
SELECT * FROM `products` WHERE `author` LIKE '平田%';
SELECT * FROM `products` WHERE `author` LIKE '%陳%';
SELECT * FROM `products` WHERE `author` LIKE '%科技%' OR `bookname`LIKE '%科技%' --作者或書名內有包含科技


-- LIMIT 第一個值是索引（從哪一筆開始） 第二個值是取幾筆  做分頁會用到（例如一頁5個商品 第一頁5個商品(0,5) 第二頁(5,5)）
SELECT * FROM `products` LIMIT 0,5;
SELECT * FROM `products` LIMIT 5,5;


SELECT * FROM `products` WHERE sid IN(6,2,3,100);  --資料跑迴圈 會依sid順序判斷是否取值 不會依照前面(括號內)順序排序
SELECT * FROM `products` WHERE sid IN (6, 2, 3) ORDER BY sid DESC;  --加到購物車順序 上到PHP會講
SELECT * FROM `products` WHERE sid IN (6, 2, 3, 10, 15) ORDER BY RAND();   --推薦商品可以用 新德：先有條件再作亂數排序 不然資料量一多 就會有效能問題


--計算總筆數
--拿到總比數
SELECT COUNT(*) FROM `products`;
SELECT COUNT(sid) FROM `products`;
SELECT COUNT(1) FROM `products`;  

--拿到某個分類別的數量
SELECT COUNT(1) FROM `products` WHERE `category_sid`=1;

--改搜尋欄位名稱
SELECT COUNT(1) num FROM `products`;  