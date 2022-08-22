--註解
--sql格式的值一定要用單引號
--資料刪除後 會有序號落差 因為primary key用過的就不能再用 但不影響其他資料

INSERT INTO `address_book` 
(`sid`, `name`, `mobile`, `email`, `birthday`, `address`, `created_at`) 
VALUES 
(NULL, '俐比王3', '0933123456', 'wang@gmail.com', '1993-10-12', '台北市大安區復興南路一段390號', NOW());

--空值 必填欄位刪除MAC有錯誤視為不行
--生日非必填 所以可執行
INSERT INTO `address_book` 
(`name`, `mobile`, `email`, `address`, `created_at`) 
VALUES 
('俐比王4', '0933123456', 'wang@gmail.com', '台北市大安區復興南路一段390號', NOW());

--手機為必填欄位 出現錯誤 無法執行
INSERT INTO `address_book` 
(`name`,`email`, `address`, `created_at`) 
VALUES 
('俐比王4', 'wang@gmail.com', '台北市大安區復興南路一段390號', NOW());


--空字串
INSERT INTO `address_book` 
(`sid`, `name`, `mobile`, `email`, `address`, `created_at`) 
VALUES 
(NULL, '俐比王5', '', 'wang@gmail.com', '台北市大安區復興南路一段390號', NOW());

--多筆資料匯入
INSERT INTO `address_book` 
(`sid`, `name`, `mobile`, `email`, `address`, `created_at`) 
VALUES 
(NULL, '俐比王6', '', 'wang@gmail.com', '台北市大安區復興南路一段390號', NOW()),
(NULL, '俐比王7', '', 'wang@gmail.com', '台北市大安區復興南路一段390號', NOW()),
(NULL, '俐比王8', '', 'wang@gmail.com', '台北市大安區復興南路一段390號', NOW()),
(NULL, '俐比王9', '', 'wang@gmail.com', '台北市大安區復興南路一段390號', NOW()),
(NULL, '俐比王10', '', 'wang@gmail.com', '台北市大安區復興南路一段390號', NOW()),
(NULL, '俐比王11', '', 'wang@gmail.com', '台北市大安區復興南路一段390號', NOW());   --最後是分號 不可以逗號會語法錯誤！！！！


--預設語法SELECT * FROM `address_book` WHERE 1 查詢這張表格所有欄位
--資料庫CRUD(schema)：新增(creat/insert) 讀取(read) 更新(update) 刪除(delete)  

--指定刪除  WHERE `sid`= 4 相當於條件if 資料庫邏輯概念以迴圈方式執行 建議先用select先檢視 確認才執行刪除
DELETE FROM `address_book` WHERE `sid` = 4;

--全部刪除(沒有下條件)
DELETE FROM `address_book`;

--指定修改
UPDATE `address_book` SET `mobile` = '0910000000' WHERE `address_book`.`sid` = 6;
--全部修改(沒有下條件)
UPDATE `address_book` SET `mobile` = '0910123456';

--排序 （數值｜字串｜時間）
SELECT * FROM `address_book` ORDER BY `address_book`.`sid` ASC;   -- ORDER BY(以哪一個欄位作排序) ASC升冪
SELECT * FROM `address_book` ORDER BY `address_book`.`sid` ;   --沒有給值 也是預設ASC升冪
SELECT * FROM `address_book` ORDER BY `address_book`.`sid` DESC;   --DESC降冪

SELECT * FROM `address_book` ORDER BY `address_book`.`name` ASC,`sid` DESC;   --不同欄位用不同排序
SELECT * FROM `address_book` ORDER BY `address_book`.`name`,`sid` DESC;   --跟上面一樣 但縮寫沒有給值 也是預設ASC升冪

--資料匯出