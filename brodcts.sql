/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : brodcts

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-03-24 10:54:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for th_address
-- ----------------------------
DROP TABLE IF EXISTS `th_address`;
CREATE TABLE `th_address` (
  `address_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL DEFAULT '0' COMMENT '用户id',
  `Province` varchar(10) NOT NULL COMMENT '省',
  `City` varchar(10) NOT NULL COMMENT '市',
  `District` varchar(10) NOT NULL COMMENT '区',
  `ConsigneeAddr` varchar(80) NOT NULL COMMENT '详细地址',
  `code` int(6) NOT NULL DEFAULT '0' COMMENT '邮编',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户地址表';

-- ----------------------------
-- Records of th_address
-- ----------------------------

-- ----------------------------
-- Table structure for th_category
-- ----------------------------
DROP TABLE IF EXISTS `th_category`;
CREATE TABLE `th_category` (
  `cat_id` int(8) NOT NULL AUTO_INCREMENT,
  `level` int(8) NOT NULL DEFAULT '0' COMMENT '上级分类',
  `pid` int(8) NOT NULL DEFAULT '0' COMMENT '下级分类',
  `seq` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `name` varchar(10) NOT NULL DEFAULT '0' COMMENT '分类名称',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
-- Records of th_category
-- ----------------------------
INSERT INTO `th_category` VALUES ('1', '0', '0', '1', '奶粉');
INSERT INTO `th_category` VALUES ('2', '1', '0', '0', '电器');
INSERT INTO `th_category` VALUES ('3', '0', '0', '0', '食品');
INSERT INTO `th_category` VALUES ('4', '0', '1', '3', '婴幼儿奶粉');
INSERT INTO `th_category` VALUES ('5', '0', '0', '0', '手机');
INSERT INTO `th_category` VALUES ('11', '1', '0', '2', '家具');
INSERT INTO `th_category` VALUES ('12', '2', '0', '2', '三鹿');
INSERT INTO `th_category` VALUES ('13', '1', '0', '44', '数组转换成xml');
INSERT INTO `th_category` VALUES ('15', '0', '2', '0', '电压力锅');

-- ----------------------------
-- Table structure for th_distributor
-- ----------------------------
DROP TABLE IF EXISTS `th_distributor`;
CREATE TABLE `th_distributor` (
  `dis_id` int(4) NOT NULL AUTO_INCREMENT,
  `DistributorId` int(10) NOT NULL DEFAULT '0' COMMENT '分销商ID',
  `Name` varchar(20) NOT NULL DEFAULT '0' COMMENT '名称',
  `AddTime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`dis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分销商';

-- ----------------------------
-- Records of th_distributor
-- ----------------------------

-- ----------------------------
-- Table structure for th_goods
-- ----------------------------
DROP TABLE IF EXISTS `th_goods`;
CREATE TABLE `th_goods` (
  `goods_id` int(8) NOT NULL AUTO_INCREMENT,
  `cat_id` int(8) NOT NULL DEFAULT '0' COMMENT '分类id',
  `productId` varchar(20) NOT NULL DEFAULT '0' COMMENT '商品编号或海关号',
  `brand` varchar(10) NOT NULL COMMENT '品名',
  `goodsFrom` varchar(10) NOT NULL COMMENT '商品来源',
  `goodsName` varchar(20) NOT NULL COMMENT '商品名称',
  `text` text COMMENT '富文本信息',
  `qty` int(4) NOT NULL DEFAULT '0' COMMENT '购买数量',
  `unit` varchar(3) NOT NULL COMMENT '单位（如件、只、箱等）',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '购买价格',
  `addTime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of th_goods
-- ----------------------------
INSERT INTO `th_goods` VALUES ('1', '6', '20160314', '巴布豆', '3', '巴布豆童鞋 框子鞋女童运动鞋2016春夏', '<p>\r\n    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n</p>\r\n<div class=\"g-header-wrapper\" style=\"word-break: break-all; font-stretch: normal; font-size: 12px; line-height: 18px; font-family: arial, tahoma, 宋体; color: rgb(51, 51, 51); white-space: normal; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\">\r\n    <div class=\"g-header\" style=\"word-break: break-all; width: 1307px; min-width: 990px; height: 90px; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(221, 221, 221);\">\r\n        <div class=\"wrapper wrapper2\" style=\"word-break: break-all; width: 1190px; min-width: 1190px; margin: 0px auto; clear: both;\">\r\n            <div class=\"g-logo\" id=\"G_SUNING_LOGO\" style=\"word-break: break-all; width: 190px; height: 60px; float: left; overflow: hidden; margin: 15px 20px 0px 0px; padding-right: 20px; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(238, 238, 238);\">\r\n                <a href=\"http://www.suning.com/\" class=\"ng-logo\" style=\"color: rgb(51, 51, 51); outline: 0px; margin: 0px; padding: 0px; word-break: break-all; display: block; width: 190px; height: 60px; overflow: hidden;\"><img src=\"http://img.suning.cn/public/v3/images/logo/snlogo.png?v=2015042703\" height=\"100\" width=\"190\" alt=\"苏宁易购\" style=\"word-break: break-all; margin-top: -20px;\"/></a>\r\n            </div>\r\n            <div class=\"storname\" style=\"word-break: break-all; float: left; margin-top: 18px; max-width: 415px;\">\r\n                <div class=\"JS_storename changeh3\" style=\"word-break: break-all; margin-bottom: 10px; font-size: 14px; height: 20px; overflow: hidden; line-height: 20px; font-weight: 700; color: rgb(102, 102, 102); zoom: 1;\">\r\n                    <span style=\"margin: 0px; padding: 0px; word-break: break-all; float: left; display: inline-block; max-width: 330px; height: 20px; overflow: hidden;\"><a id=\"chead_indexUrl\" href=\"http://gagaya.suning.com/\" title=\"嘎嘎鸭食品专营店\" style=\"color: rgb(102, 102, 102); outline: 0px; margin: 0px; padding: 0px; word-break: break-all; word-wrap: break-word; display: inline-block; white-space: pre;\"><h1 style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-size: 14px; word-break: break-all;\">\r\n                        嘎嘎鸭食品专营店\r\n                    </h1></a></span><span class=\"icon_ic\" id=\"gdShopSpan\" style=\"margin: 2px 0px 0px 9px; padding: 0px 0px 0px 7px; word-break: break-all; float: left; height: 16px; line-height: 16px; font-size: 12px; font-weight: normal; background: url(&quot;images/icon_ic.png&quot;) 0px 0px no-repeat;\"><span title=\"江苏馆\" id=\"gdShopMark\" style=\"margin: 0px; padding: 0px 7px 0px 0px; word-break: break-all; float: left; display: block; max-width: 330px; height: 16px; overflow: hidden; line-height: 15px; color: rgb(255, 255, 255); background: url(&quot;images/icon_ic.png&quot;) 100% 0px no-repeat;\">江苏馆</span></span>\r\n                </div>\r\n                <div class=\"bd clearfix\" style=\"word-break: break-all; zoom: 1; border: none !important;\">\r\n                    <div class=\"JS_store_grade store-grade\" style=\"word-break: break-all; float: left; padding-bottom: 19px; position: relative; margin-right: 25px; cursor: pointer; z-index: 13;\">\r\n                        <h4 id=\"chead_road\" class=\"\" style=\"margin: 0px; padding: 0px 18px 0px 0px; font-size: 12px; word-break: break-all; background: url(&quot;../images/icon_header_sprite.png&quot;) 100% 8px no-repeat;\">\r\n                            店铺评分<span style=\"margin: 0px 0px 0px 8px; padding: 0px 4px 0px 0px; word-break: break-all; font-size: 14px; color: rgb(102, 102, 102); font-family: Arial;\"><span id=\"chead_shopStar\" style=\"margin: 0px; padding: 0px; word-break: break-all;\">4.76</span></span>\r\n                        </h4>\r\n                    </div><a class=\"online-sale\" id=\"onlineService1\" sa-uv=\"header_online\" ignore-page=\"true\" style=\"color: rgb(0, 136, 204); outline: 0px; margin: 2px 10px 0px 0px; padding: 0px; word-break: break-all; float: left; height: 18px; overflow: hidden;\" href=\"http://\"><img src=\"http://talk8.suning.com/project/yunxin/images/online.gif?_t=1458107832802\" alt=\"和我联系\" style=\"word-break: break-all; margin-right: 3px;\"/></a>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>\r\n<div class=\"sf-sortbox sf-noDrag sf-autoWidth\" style=\"word-break: break-all; width: auto; margin: 0px auto; color: rgb(51, 51, 51); font-family: arial, tahoma, 宋体; font-size: 12px; line-height: 18px; white-space: normal;\">\r\n    <div class=\"sf-layoutList JS-head\" layoutid=\"10276900\" style=\"word-break: break-all; border: none; padding: 0px; margin: 0px auto; cursor: default; zoom: 1; font-stretch: normal; font-size: 14px; line-height: 1.5; font-family: &#39;Microsoft YaHei&#39;; width: 990px; position: relative; z-index: 12 !important; background: url(&quot;http://image.suning.cn/uimg/sop/commodity/889930332124990741337790_x.jpg&quot;) 50% 0px no-repeat rgb(244, 244, 244);\">\r\n        <div class=\"sf-module990\" pointx=\"F\" modulestyle=\"990\" style=\"word-break: break-all; cursor: default; width: 990px; margin: 0px auto;\">\r\n            <div class=\"sf-moduleList sf-noPadding ds-zqs-top\" moduleid=\"\" moduletype=\"\" style=\"word-break: break-all; position: relative; border: none; color: rgb(255, 255, 255); padding: 0px; margin: 0px; cursor: default; font-family: &#39;?�騨��??o��&#39;, tahoma, arial; height: 120px; overflow: inherit; background: none;\">\r\n                <div class=\"hd\" style=\"word-break: break-all; height: 120px; background-image: url(&quot;http://image.suning.cn/uimg/sop/commodity/192401539095563214879740_x.jpg&quot;); background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: 50% 0%; background-repeat: no-repeat;\">\r\n                    <div class=\"acg_bd\" style=\"word-break: break-all; width: 950px; height: 120px; position: relative; margin: 0px auto;\">\r\n                        <div class=\"shop\" style=\"word-break: break-all; width: 380px; height: 120px; position: absolute; top: 5px; left: 425px; z-index: 15; list-style: none;\"></div><a target=\"_blank\" href=\"http://product.suning.com/detail_0070110669_140361185.html\" class=\"logo2\" data-spm-anchor-id=\"0.0.0.0\" style=\"color: rgb(255, 255, 255); outline: none; margin: 0px; padding: 0px; word-break: break-all; cursor: pointer; width: 480px; height: 93px; top: -10px; left: 0px; position: absolute; list-style-image: none;\"></a>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"sf-moduleList ds-zqs-dhs sf-noPadding\" moduleid=\"\" moduletype=\"\" style=\"word-break: break-all; position: relative; border: none; color: rgb(255, 255, 255); padding: 0px; margin: 0px; cursor: default; overflow: inherit; background: none;\">\r\n                <div style=\"word-break: break-all; height: 20px;\">\r\n                    <div class=\"user_nav_box dhkp\" style=\"word-break: break-all; width: 1200px; height: 30px; position: absolute; left: 495px; margin-left: -600px; z-index: 5;\">\r\n                        <div class=\"all_cats_box\" style=\"word-break: break-all; width: 210px; z-index: 2; position: absolute; height: 30px;\">\r\n                            <div class=\"all_cats\" style=\"word-break: break-all; height: 30px; line-height: 30px;\">\r\n                                <a href=\"http://product.suning.com/detail_0070110669_140361185.html\" style=\"color: rgb(51, 51, 51); outline: none; margin: 0px; padding: 0px 20px; word-break: break-all; display: block; text-align: center; height: 30px;\"><span class=\"xff1\" style=\"margin: 0px; padding: 0px 40px 0px 0px; word-break: break-all; color: rgb(255, 255, 255); display: block; height: 30px; background: rgb(67, 67, 67);\">查看所有分类</span></a>\r\n                            </div>\r\n                        </div>\r\n                        <ul class=\"user_menu\" style=\"margin-right: 0px; margin-left: 210px; padding: 0px; list-style: none; word-break: break-all; height: 30px; font-size: 12px; overflow: hidden; width: 990px; z-index: 2; position: relative;\">\r\n                            <li class=\"current\" style=\"margin: 0px; padding: 0px; list-style: none; word-break: break-all; float: left; height: 30px; line-height: 30px; text-align: center; display: block; position: relative; font-family: &#39;microsoft yahei&#39;; font-size: 14px; font-weight: bold; border-right-width: 1px; border-right-style: dotted; border-right-color: rgb(102, 102, 102);\">\r\n                                <p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; word-break: break-all; cursor: pointer; transition: all 0.8s ease; height: 30px;\">\r\n                                    首页有惊喜\r\n                                </p><a class=\"aa\" href=\"http://gagaya.suning.com/\" target=\"_blank\" style=\"color: rgb(255, 255, 255); outline: none; margin: 0px; padding: 0px 20px; word-break: break-all; display: block; height: 30px; background-color: rgb(178, 1, 53);\">首页有惊喜</a><span style=\"margin: 0px; padding: 0px; word-break: break-all;\"></span>\r\n                            </li>\r\n                            <li class=\"hot\" style=\"margin: 0px; padding: 0px; list-style: none; word-break: break-all; float: left; height: 30px; line-height: 30px; text-align: center; display: inline; position: relative; border-right-width: 1px; border-right-style: dotted; border-right-color: rgb(102, 102, 102);\">\r\n                                <p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; word-break: break-all; font-size: 14px; cursor: pointer; transition: all 0.8s ease; height: 30px;\">\r\n                                    高邮咸鸭蛋\r\n                                </p><a class=\"aa\" href=\"http://shop.suning.com/70110669/list_200192908_1.html\" target=\"_blank\" style=\"color: rgb(255, 255, 255); outline: none; margin: 0px; padding: 0px 20px; word-break: break-all; display: block; font-family: &#39;microsoft yahei&#39;; font-size: 14px; height: 30px; background-color: rgb(178, 1, 53);\">高邮咸鸭蛋</a><span style=\"margin: 0px; padding: 0px; word-break: break-all; height: 16px; width: 25px; top: 0px; right: -3px; display: inline-block; overflow: hidden; position: absolute; vertical-align: middle; background: url(&quot;../images/hot.gif&quot;) no-repeat;\"></span>\r\n                            </li>\r\n                            <li class=\"hot\" style=\"margin: 0px; padding: 0px; list-style: none; word-break: break-all; float: left; height: 30px; line-height: 30px; text-align: center; display: inline; position: relative; border-right-width: 1px; border-right-style: dotted; border-right-color: rgb(102, 102, 102);\">\r\n                                <p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; word-break: break-all; font-size: 14px; cursor: pointer; transition: all 0.8s ease; height: 30px;\">\r\n                                    高邮松花蛋\r\n                                </p><a class=\"aa\" href=\"http://shop.suning.com/70110669/list_200194867_1.html\" target=\"_blank\" style=\"color: rgb(255, 255, 255); outline: none; margin: 0px; padding: 0px 20px; word-break: break-all; display: block; font-family: &#39;microsoft yahei&#39;; font-size: 14px; height: 30px; background-color: rgb(178, 1, 53);\">高邮松花蛋</a><span style=\"margin: 0px; padding: 0px; word-break: break-all; height: 16px; width: 25px; top: 0px; right: -3px; display: inline-block; overflow: hidden; position: absolute; vertical-align: middle; background: url(&quot;../images/hot.gif&quot;) no-repeat;\"></span>\r\n                            </li>\r\n                            <li class=\"current\" style=\"margin: 0px; padding: 0px; list-style: none; word-break: break-all; float: left; height: 30px; line-height: 30px; text-align: center; display: block; position: relative; font-family: &#39;microsoft yahei&#39;; font-size: 14px; font-weight: bold; border-right-width: 1px; border-right-style: dotted; border-right-color: rgb(102, 102, 102);\">\r\n                                <p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; word-break: break-all; cursor: pointer; transition: all 0.8s ease; height: 30px;\">\r\n                                    高邮双黄蛋\r\n                                </p><a class=\"aa\" href=\"http://shop.suning.com/70110669/list_200192909_1.html\" target=\"_blank\" style=\"color: rgb(255, 255, 255); outline: none; margin: 0px; padding: 0px 20px; word-break: break-all; display: block; height: 30px; background-color: rgb(178, 1, 53);\">高邮双黄蛋</a><span style=\"margin: 0px; padding: 0px; word-break: break-all;\"></span>\r\n                            </li>\r\n                            <li class=\"hot\" style=\"margin: 0px; padding: 0px; list-style: none; word-break: break-all; float: left; height: 30px; line-height: 30px; text-align: center; display: inline; position: relative; border-right-width: 1px; border-right-style: dotted; border-right-color: rgb(102, 102, 102);\">\r\n                                <p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; word-break: break-all; font-size: 14px; cursor: pointer; transition: all 0.8s ease; height: 30px;\">\r\n                                    扬州狮子头\r\n                                </p><a class=\"aa\" href=\"http://shop.suning.com/70110669/list_200197939_1.html\" target=\"_blank\" style=\"color: rgb(255, 255, 255); outline: none; margin: 0px; padding: 0px 20px; word-break: break-all; display: block; font-family: &#39;microsoft yahei&#39;; font-size: 14px; height: 30px; background-color: rgb(178, 1, 53);\">扬州狮子头</a><span style=\"margin: 0px; padding: 0px; word-break: break-all; height: 16px; width: 25px; top: 0px; right: -3px; display: inline-block; overflow: hidden; position: absolute; vertical-align: middle; background: url(&quot;../images/hot.gif&quot;) no-repeat;\"></span>\r\n                            </li>\r\n                            <li class=\"current\" style=\"margin: 0px; padding: 0px; list-style: none; word-break: break-all; float: left; height: 30px; line-height: 30px; text-align: center; display: block; position: relative; font-family: &#39;microsoft yahei&#39;; font-size: 14px; font-weight: bold; border-right-width: 1px; border-right-style: dotted; border-right-color: rgb(102, 102, 102);\">\r\n                                <p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; word-break: break-all; cursor: pointer; transition: all 0.8s ease; height: 30px;\">\r\n                                    扬州风鹅\r\n                                </p><a class=\"aa\" href=\"http://shop.suning.com/70110669/list_200199697_1.html\" target=\"_blank\" style=\"color: rgb(255, 255, 255); outline: none; margin: 0px; padding: 0px 20px; word-break: break-all; display: block; height: 30px; background-color: rgb(178, 1, 53);\">扬州风鹅</a><span style=\"margin: 0px; padding: 0px; word-break: break-all;\"></span>\r\n                            </li>\r\n                            <li class=\"current\" style=\"margin: 0px; padding: 0px; list-style: none; word-break: break-all; float: left; height: 30px; line-height: 30px; text-align: center; display: block; position: relative; font-family: &#39;microsoft yahei&#39;; font-size: 14px; font-weight: bold; border-right-width: 1px; border-right-style: dotted; border-right-color: rgb(102, 102, 102);\">\r\n                                <p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; word-break: break-all; cursor: pointer; transition: all 0.8s ease; height: 30px;\">\r\n                                    中华故事-高邮\r\n                                </p><a class=\"aa\" href=\"http://shop.suning.com/70110669/10082272.html\" target=\"_blank\" style=\"color: rgb(255, 255, 255); outline: none; margin: 0px; padding: 0px 20px; word-break: break-all; display: block; height: 30px; background-color: rgb(178, 1, 53);\">中华故事-高邮</a><span style=\"margin: 0px; padding: 0px; word-break: break-all;\"></span>\r\n                            </li>\r\n                            <li class=\"current\" style=\"margin: 0px; padding: 0px; list-style: none; word-break: break-all; float: left; height: 30px; line-height: 30px; text-align: center; display: block; position: relative; font-family: &#39;microsoft yahei&#39;; font-size: 14px; font-weight: bold; border-right-width: 1px; border-right-style: dotted; border-right-color: rgb(102, 102, 102);\">\r\n                                <p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; word-break: break-all; cursor: pointer; transition: all 0.8s ease; height: 30px;\">\r\n                                    中华特色馆\r\n                                </p><a class=\"aa\" href=\"http://china.suning.com/\" target=\"_blank\" style=\"color: rgb(255, 255, 255); outline: none; margin: 0px; padding: 0px 20px; word-break: break-all; display: block; height: 30px; background-color: rgb(178, 1, 53);\">中华特色馆</a><span style=\"margin: 0px; padding: 0px; word-break: break-all;\"></span>\r\n                            </li>\r\n                        </ul>\r\n                    </div>\r\n                    <div style=\"word-break: break-all; width: 1920px; height: 30px; overflow: hidden; position: absolute; z-index: 4; left: 495px; margin-left: -960px; background: rgb(102, 102, 102) !important;\"></div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>\r\n<div class=\"wrapper\" style=\"word-break: break-all; width: 1190px; min-width: 1190px; margin: 0px auto; clear: both; color: rgb(51, 51, 51); font-family: arial, tahoma, 宋体; font-size: 12px; line-height: 18px; white-space: normal;\">\r\n    <div class=\"breadcrumb\" style=\"word-break: break-all; position: relative; height: 20px; line-height: 20px; z-index: 10; padding: 7px 0px;\"></div>\r\n</div>\r\n<p>\r\n    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br/>\r\n</p>', '3', '双', '10.33', '1457918914');
INSERT INTO `th_goods` VALUES ('2', '0', '20160315', '巴布豆', '', '巴布豆童鞋 男童运动鞋2016春夏', null, '6', '双', '20.00', '1457919914');
INSERT INTO `th_goods` VALUES ('3', '1', '20160316', '三鹿', '4466', '奶粉', '<h1>hello,world!!!!<img src=\"http://img.baidu.com/hi/jx2/j_0001.gif\" _src=\"http://img.baidu.com/hi/jx2/j_0001.gif\"/></h1>', '66', '罐', '100.00', '1457929914');
INSERT INTO `th_goods` VALUES ('4', '5', '03333', '三星', '0021', '没有名称', '<p>\r\n    &nbsp; &nbsp; &nbsp;&lt;p&gt;手机销售 &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt; &nbsp; &nbsp; &nbsp;\r\n</p>', '33', '台', '1120.00', '1458526405');
INSERT INTO `th_goods` VALUES ('7', '2', '20163210', 'htc', '4466', '叫什么名字呢', '<ul class=\"hot-list\" style=\"padding-left: 13px; list-style: none; word-break: break-all; overflow: hidden; zoom: 1; font-family: &#39;Microsoft Yahei&#39;; font-size: 12px; white-space: normal;\"><li style=\"margin: 0px 25px; padding: 0px; list-style: none; word-break: break-all; float: left; display: inline-block; width: 120px; height: 200px; overflow: hidden; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\"><a target=\"_blank\" href=\"http://product.suning.com//0070068269/106511786.html?src=pcms_134611819_recms_1-1_p_0070068269_106511786_01A_7-4_0_A\" name1=\"pcms_134611819_recms_1-1_p_0070068269_106511786_01A_7-4_0_A\" style=\"color: rgb(102, 102, 102); outline: 0px; margin: 0px; padding: 0px; word-break: break-all;\"><img src=\"http://image4.suning.cn/b2c/catentries/000000000106511786_1_400x400.jpg\" width=\"120px\" height=\"120px\" alt=\"\" style=\"word-break: break-all; display: block; width: 120px; height: 120px; margin-top: 20px;\"/></a><p class=\"title\" style=\"margin-top: 3px; margin-bottom: 3px; padding: 0px; word-break: break-all; height: 35px; overflow: hidden;\"><a href=\"http://product.suning.com//0070068269/106511786.html?src=pcms_134611819_recms_1-1_c_0070068269_106511786_01A_7-4_0_A\" name1=\"pcms_134611819_recms_1-1_c_0070068269_106511786_01A_7-4_0_A\" id=\"baoguang_recms_1-1_0070068269_106511786_01A_7-4_0_A\" style=\"color: rgb(102, 102, 102); outline: 0px; margin: 0px; padding: 0px; word-break: break-all;\">雷士照明LED平板灯吸顶集成吊顶灯超薄嵌入式铝扣板灯厨卫方灯30*30CM</a></p><p class=\"price\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(221, 0, 0); font-family: Tahoma; font-weight: 700;\"><span style=\"margin: 0px; padding: 0px; word-break: break-all; font-family: Arial;\">¥</span>88.00</p></li><li style=\"margin: 0px 25px; padding: 0px; list-style: none; word-break: break-all; float: left; display: inline-block; width: 120px; height: 200px; overflow: hidden; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;\"><a target=\"_blank\" href=\"http://product.suning.com//0070068269/106419794.html?src=pcms_134611819_recms_1-2_p_0070068269_106419794_01A_7-4_0_A\" name1=\"pcms_134611819_recms_1-2_p_0070068269_106419794_01A_7-4_0_A\" style=\"color: rgb(102, 102, 102); outline: 0px; margin: 0px; padding: 0px; word-break: break-all;\"><img src=\"http://image2.suning.cn/b2c/catentries/000000000106419794_1_400x400.jpg\" width=\"120px\" height=\"120px\" alt=\"\" style=\"word-break: break-all; display: block; width: 120px; height: 120px; margin-top: 20px;\"/></a><p class=\"title\" style=\"margin-top: 3px; margin-bottom: 3px; padding: 0px; word-break: break-all; height: 35px; overflow: hidden;\"><a href=\"http://product.suning.com//0070068269/106419794.html?src=pcms_134611819_recms_1-2_c_0070068269_106419794_01A_7-4_0_A\" name1=\"pcms_134611819_recms_1-2_c_0070068269_106419794_01A_7-4_0_A\" id=\"baoguang_recms_1-2_0070068269_106419794_01A_7-4_0_A\" style=\"color: rgb(102, 102, 102); outline: 0px; margin: 0px; padding: 0px; word-break: break-all;\">【爆款】雷士照明LED灯带客厅吊顶暗槽高亮软灯带3528-60珠暖白光</a></p><p class=\"price\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; word-break: break-all; color: rgb(221, 0, 0); font-family: Tahoma; font-weight: 700;\"><span style=\"margin: 0px; padding: 0px; word-break: break-all; font-family: Arial;\">¥</span>9.80</p></li></ul><p><br/></p>', '20', '数量单', '1999.00', '1458610154');

-- ----------------------------
-- Table structure for th_goods_photos
-- ----------------------------
DROP TABLE IF EXISTS `th_goods_photos`;
CREATE TABLE `th_goods_photos` (
  `pho_id` int(8) NOT NULL AUTO_INCREMENT,
  `goods_id` int(8) NOT NULL DEFAULT '0' COMMENT '商品id',
  `s_img` varchar(80) DEFAULT NULL COMMENT '商品小图片链接',
  `m_img` varchar(80) DEFAULT NULL COMMENT '商品中图片链接',
  `l_img` varchar(80) DEFAULT NULL COMMENT '商品大图片链接',
  PRIMARY KEY (`pho_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='商品图片表';

-- ----------------------------
-- Records of th_goods_photos
-- ----------------------------
INSERT INTO `th_goods_photos` VALUES ('1', '1', 'http://image2.suning.cn/b2c/catentries/000000000140361185_1_400x400.jpg', null, null);

-- ----------------------------
-- Table structure for th_money_log
-- ----------------------------
DROP TABLE IF EXISTS `th_money_log`;
CREATE TABLE `th_money_log` (
  `mon_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL DEFAULT '0' COMMENT '用户id',
  `orderId` varchar(20) DEFAULT '0' COMMENT '订单号',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '资金',
  `content` varchar(50) NOT NULL COMMENT '备注',
  `condition` varchar(4) NOT NULL COMMENT '收支情况 收入还是支出',
  `status` varchar(8) NOT NULL COMMENT '交易状态',
  `addTime` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`mon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='资金明细';

-- ----------------------------
-- Records of th_money_log
-- ----------------------------
INSERT INTO `th_money_log` VALUES ('1', '0', '0', '1000.00', '充值', '收入', '交易成功', '1458699326');
INSERT INTO `th_money_log` VALUES ('2', '0', '20160313', '1000.00', '充值', '收入', '交易成功', '1458699326');
INSERT INTO `th_money_log` VALUES ('3', '1', '20160313', '1000.00', '充值', '收入', '交易成功', '1458699326');

-- ----------------------------
-- Table structure for th_orders
-- ----------------------------
DROP TABLE IF EXISTS `th_orders`;
CREATE TABLE `th_orders` (
  `ord_id` int(4) NOT NULL AUTO_INCREMENT,
  `orderId` varchar(20) NOT NULL DEFAULT '0' COMMENT '订单编号',
  `user_id` int(8) NOT NULL DEFAULT '0' COMMENT '分销商id',
  `key` varchar(30) NOT NULL DEFAULT '0',
  `orderFrom` varchar(4) NOT NULL DEFAULT '0000' COMMENT '订单来源网站id(默认为：0000)',
  `number` int(4) NOT NULL DEFAULT '0' COMMENT '数量',
  `distributorId` int(10) NOT NULL DEFAULT '0' COMMENT '分销商ID问技术拿',
  `pro_id` int(4) DEFAULT '0' COMMENT '优惠id',
  `discount` decimal(10,2) DEFAULT '0.00' COMMENT '折扣',
  `goodsAmount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '实付金额（运费-优惠总金额+税）',
  `currCode` varchar(8) NOT NULL DEFAULT 'RMB' COMMENT '价格单位（默认：RMB）',
  `buyerAccount` varchar(20) DEFAULT NULL COMMENT '买家账号',
  `realName` varchar(10) DEFAULT NULL COMMENT '真实姓名',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `postFee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '总运费',
  `address` varchar(50) DEFAULT NULL COMMENT '收货人详细地址',
  `mobile` varchar(11) DEFAULT NULL COMMENT '收货人电话',
  `logisticsNo` varchar(30) DEFAULT NULL COMMENT '快递编号',
  `logisticsName` varchar(20) DEFAULT NULL COMMENT '快递名称（必需是：邮政速递、顺丰速运、邮政小包、中通速递）',
  `trade_code` varchar(30) DEFAULT NULL COMMENT '交易号',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 0待付款 1 付款 -1关闭 2退款',
  `payTime` int(10) NOT NULL DEFAULT '0' COMMENT '付款时间',
  `addTime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`ord_id`),
  UNIQUE KEY `OrderId` (`orderId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='订单表';

-- ----------------------------
-- Records of th_orders
-- ----------------------------
INSERT INTO `th_orders` VALUES ('1', '20160310', '0', 'test123456', '0000', '1', '0', '0', '0.00', '0.00', 'RMB', null, null, null, '0.00', null, null, '33333', null, null, '2', '1457918914', '1457918914');
INSERT INTO `th_orders` VALUES ('10', '20160311', '1', '0', '0000', '2', '0', '0', '0.00', '0.00', 'RMB', null, '张三', null, '0.00', '福州鼓楼', '15312301238', null, null, null, '1', '1458097655', '1458026471');
INSERT INTO `th_orders` VALUES ('11', '20160312', '1', '0', '0000', '3', '0', '0', '0.00', '0.00', 'RMB', null, '张三', null, '0.00', '福州鼓楼', '15312301238', null, null, null, '0', '1458097655', '1458097655');
INSERT INTO `th_orders` VALUES ('13', '20160313', '1', '0', '0000', '3', '0', '0', '0.00', '100.00', 'RMB', null, '张三', null, '0.00', '福州鼓楼', '15312301238', null, null, '1213213246', '1', '1458097655', '1458097655');
INSERT INTO `th_orders` VALUES ('16', '20160314', '1', '0', '0000', '3', '0', '0', '0.00', '0.00', 'RMB', null, '张三', null, '0.00', '福州鼓楼', '15312301238', null, null, null, '4', '1458097655', '1458097655');

-- ----------------------------
-- Table structure for th_orders_info
-- ----------------------------
DROP TABLE IF EXISTS `th_orders_info`;
CREATE TABLE `th_orders_info` (
  `info_id` int(8) NOT NULL AUTO_INCREMENT,
  `ord_id` int(8) NOT NULL DEFAULT '0' COMMENT '订单表id',
  `goods_id` int(8) NOT NULL DEFAULT '0' COMMENT '商品id',
  `orderId` varchar(20) DEFAULT NULL COMMENT '订单号',
  `goodsName` varchar(20) DEFAULT NULL COMMENT '商品名称',
  `qty` int(4) NOT NULL DEFAULT '0' COMMENT '购买数量',
  `return_qty` int(4) NOT NULL DEFAULT '0' COMMENT '申请退货数量',
  `is_back` int(4) NOT NULL DEFAULT '0' COMMENT '完成退货数量',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '购买价格',
  `postFee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '运费',
  `unit` varchar(3) DEFAULT NULL COMMENT '单位（如件、只、箱等）',
  `img` varchar(50) DEFAULT NULL COMMENT '商品图片',
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='订单明细';

-- ----------------------------
-- Records of th_orders_info
-- ----------------------------
INSERT INTO `th_orders_info` VALUES ('1', '0', '0', '20160310', '奶粉', '2', '0', '0', '44.00', '12.00', null, null);
INSERT INTO `th_orders_info` VALUES ('2', '13', '0', '20160312', '鞋子', '1', '0', '0', '33.00', '12.00', null, null);
INSERT INTO `th_orders_info` VALUES ('15', '10', '1', '20160311', '巴布豆童鞋 框子鞋女童运动鞋2016春夏', '2', '0', '0', '10.33', '0.00', '双', null);
INSERT INTO `th_orders_info` VALUES ('16', '10', '2', '20160311', '巴布豆童鞋 男童运动鞋2016春夏', '1', '0', '0', '20.00', '0.00', '双', null);
INSERT INTO `th_orders_info` VALUES ('17', '13', '1', '20160312', '巴布豆童鞋 框子鞋女童运动鞋2016春夏', '2', '0', '0', '10.33', '0.00', '双', null);
INSERT INTO `th_orders_info` VALUES ('18', '13', '2', '20160312', '巴布豆童鞋 男童运动鞋2016春夏', '1', '0', '0', '20.00', '0.00', '双', null);
INSERT INTO `th_orders_info` VALUES ('19', '13', '2', '20160312', '巴布豆童鞋 男童运动鞋2016春夏', '1', '0', '0', '20.00', '0.00', '双', null);
INSERT INTO `th_orders_info` VALUES ('20', '13', '2', '20160312', '巴布豆童鞋 男童运动鞋2016春夏', '1', '0', '0', '20.00', '0.00', '双', null);

-- ----------------------------
-- Table structure for th_postage
-- ----------------------------
DROP TABLE IF EXISTS `th_postage`;
CREATE TABLE `th_postage` (
  `pos_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL COMMENT '快递名称',
  `startPoint` varchar(10) DEFAULT NULL COMMENT '出发地',
  `endPoint` varchar(10) DEFAULT NULL COMMENT '目的地',
  `firstPrice` decimal(10,2) DEFAULT NULL COMMENT '首重价格',
  `nextPrice` decimal(10,2) DEFAULT NULL COMMENT '续重价格',
  `day` tinyint(1) DEFAULT NULL COMMENT '到达天数',
  `firstHeavy` tinyint(1) DEFAULT NULL COMMENT '首重',
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='邮费表';

-- ----------------------------
-- Records of th_postage
-- ----------------------------
INSERT INTO `th_postage` VALUES ('1', '申通', '浙江', '上海', '5.00', '2.00', '1', '1');
INSERT INTO `th_postage` VALUES ('2', '申通', '浙江', '江苏', '5.00', '2.00', '2', '1');

-- ----------------------------
-- Table structure for th_promotions
-- ----------------------------
DROP TABLE IF EXISTS `th_promotions`;
CREATE TABLE `th_promotions` (
  `pro_id` int(4) NOT NULL AUTO_INCREMENT,
  `OrderId` varchar(20) NOT NULL DEFAULT '0' COMMENT '订单编号',
  `ProAmount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '优惠价格',
  `ProRemark` varchar(50) NOT NULL DEFAULT '0' COMMENT '说明',
  `UseTime` int(10) NOT NULL DEFAULT '0' COMMENT '使用时间',
  `AddTime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='优惠活动表';

-- ----------------------------
-- Records of th_promotions
-- ----------------------------

-- ----------------------------
-- Table structure for th_users
-- ----------------------------
DROP TABLE IF EXISTS `th_users`;
CREATE TABLE `th_users` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(20) NOT NULL DEFAULT '0' COMMENT '用户名',
  `password` varchar(32) NOT NULL DEFAULT '0' COMMENT '密码',
  `key` varchar(30) NOT NULL DEFAULT '0',
  `code` varchar(30) NOT NULL DEFAULT '0' COMMENT '效验码',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '用户资金',
  `validityTime` int(10) NOT NULL DEFAULT '0' COMMENT '有效时间',
  `vheckTime` int(10) NOT NULL DEFAULT '0' COMMENT '检测时间',
  `addTime` int(10) NOT NULL DEFAULT '0' COMMENT '注册时间',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of th_users
-- ----------------------------
INSERT INTO `th_users` VALUES ('1', 'test123456', 'e10adc3949ba59abbe56e057f20f883e', 'test123456', '123', '0.00', '16070400', '1457684736', '1457684736');
INSERT INTO `th_users` VALUES ('3', 'test', 'e10adc3949ba59abbe56e057f20f883e', 'test123456', '123', '0.00', '16070400', '1457684736', '1457684736');
INSERT INTO `th_users` VALUES ('4', 'hb', 'e10adc3949ba59abbe56e057f20f883e', 'test123456', '123', '0.00', '16070400', '1457684736', '1457684736');
