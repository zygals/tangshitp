alter table ts_shop add end_time time after start_time;


 drop table if exists ts_setting;
CREATE TABLE `ts_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,

  `img` varchar(255) NOT NULL DEFAULT '' COMMENT '订单列表页上面图',
  create_time int default 0,
update_time int default 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='网站相关设置';
alter table ts_menu_admin modify is_show_to_shop tinyint  default 1 comment '是否给商户看';

