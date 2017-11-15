二〇一七年十一月十四日 11:07:27

ALTER TABLE `ts_shop`
CHANGE COLUMN `opening_hours` `start_time`  time NOT NULL AFTER `phone`;


ALTER TABLE `ts_shop`
CHANGE COLUMN `opening_hours` `start_time`  time NOT NULL AFTER `phone`;

ALTER TABLE `ts_shop`
ADD COLUMN `img`  varchar(255) NOT NULL AFTER `end_time`;

ALTER TABLE `ts_order`
ADD COLUMN `shop_id`  int(11) NOT NULL COMMENT '预定分店id' AFTER `update_time`;


