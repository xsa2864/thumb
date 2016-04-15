/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : brodcts

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-04-15 16:13:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for th_address
-- ----------------------------
DROP TABLE IF EXISTS `th_address`;
CREATE TABLE `th_address` (
  `address_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL DEFAULT '0' COMMENT '用户id',
  `province` varchar(10) NOT NULL COMMENT '省',
  `city` varchar(10) NOT NULL COMMENT '市',
  `district` varchar(10) NOT NULL COMMENT '区',
  `consigneeaddr` varchar(80) NOT NULL COMMENT '详细地址',
  `code` int(6) NOT NULL DEFAULT '0' COMMENT '邮编',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户地址表';

-- ----------------------------
-- Records of th_address
-- ----------------------------

-- ----------------------------
-- Table structure for th_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `th_auth_group`;
CREATE TABLE `th_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  `describe` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of th_auth_group
-- ----------------------------
INSERT INTO `th_auth_group` VALUES ('1', '超级管理员', '1', '', '拥有全部权限');
INSERT INTO `th_auth_group` VALUES ('2', '网站管理员', '1', '11,12,13,14,2,1,7,9,15,16,17', '拥有相对多的权限');
INSERT INTO `th_auth_group` VALUES ('3', '发布人员', '1', '2,15,16,17', '拥有发布、修改文章的权限');
INSERT INTO `th_auth_group` VALUES ('4', '编辑', '1', '11,12,13,14,2', '拥有文章模块的所有权限');
INSERT INTO `th_auth_group` VALUES ('5', '积分小于50', '1', '2,15', '积分小于50');
INSERT INTO `th_auth_group` VALUES ('6', '积分大于50小于200', '1', '2,16', '积分大于50小于200');
INSERT INTO `th_auth_group` VALUES ('7', '积分大于200', '1', '2,17', '积分大于200');
INSERT INTO `th_auth_group` VALUES ('8', '默认组', '1', '2,1,3', '拥有一些通用的权限');

-- ----------------------------
-- Table structure for th_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `th_auth_group_access`;
CREATE TABLE `th_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of th_auth_group_access
-- ----------------------------
INSERT INTO `th_auth_group_access` VALUES ('1', '1');
INSERT INTO `th_auth_group_access` VALUES ('2', '2');
INSERT INTO `th_auth_group_access` VALUES ('3', '3');
INSERT INTO `th_auth_group_access` VALUES ('4', '4');
INSERT INTO `th_auth_group_access` VALUES ('5', '5');
INSERT INTO `th_auth_group_access` VALUES ('6', '6');
INSERT INTO `th_auth_group_access` VALUES ('7', '7');

-- ----------------------------
-- Table structure for th_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `th_auth_rule`;
CREATE TABLE `th_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `mid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of th_auth_rule
-- ----------------------------
INSERT INTO `th_auth_rule` VALUES ('1', 'Admin/Auth/accessList', '权限列表', '1', '1', '', '3');
INSERT INTO `th_auth_rule` VALUES ('2', 'Admin/Index/index', '后台首页', '1', '1', '', '2');
INSERT INTO `th_auth_rule` VALUES ('3', 'Admin/Auth/accessAdd', '添加权限页面', '1', '1', '', '3');
INSERT INTO `th_auth_rule` VALUES ('4', 'Admin/Auth/groupList', '角色管理页面', '1', '1', '', '3');
INSERT INTO `th_auth_rule` VALUES ('5', 'Admin/Auth/addHandle', '添加权限', '1', '1', '', '3');
INSERT INTO `th_auth_rule` VALUES ('6', 'Admin/Auth/groupAddHandle', '添加角色', '1', '1', '', '3');
INSERT INTO `th_auth_rule` VALUES ('7', 'Admin/Auth/accessSelect', '角色授权页面', '1', '1', '', '3');
INSERT INTO `th_auth_rule` VALUES ('8', 'Admin/Auth/accessSelectHandle', '更新角色权限', '1', '1', '', '3');
INSERT INTO `th_auth_rule` VALUES ('9', 'Admin/Auth/groupMember', '角色组成员列表', '1', '1', '', '3');
INSERT INTO `th_auth_rule` VALUES ('10', 'Admin/Auth/accessDelHandle', '删除权限', '1', '1', '', '3');
INSERT INTO `th_auth_rule` VALUES ('11', 'Admin/Member/memberList', '会员列表', '1', '1', '', '1');
INSERT INTO `th_auth_rule` VALUES ('12', 'Admin/Member/memberAdd', '添加会员页面', '1', '1', '', '1');
INSERT INTO `th_auth_rule` VALUES ('13', 'Admin/Member/addHandle', '添加会员', '1', '1', '', '1');
INSERT INTO `th_auth_rule` VALUES ('14', 'Admin/Member/deleteHandle', '删除会员', '1', '1', '', '1');
INSERT INTO `th_auth_rule` VALUES ('15', 'score50', '积分小于50', '1', '1', '{score}<50', '4');
INSERT INTO `th_auth_rule` VALUES ('16', 'score100', '积分大于50小于200', '1', '1', '{score}>50 and {score}<200', '4');
INSERT INTO `th_auth_rule` VALUES ('17', 'score200', '积分大于200', '1', '1', '{score}>200', '4');

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
-- Table structure for th_daily_task
-- ----------------------------
DROP TABLE IF EXISTS `th_daily_task`;
CREATE TABLE `th_daily_task` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '工作日志表ID',
  `user_id` smallint(5) DEFAULT NULL COMMENT '用户ID',
  `content` text COMMENT '日志内容',
  `task_date` date DEFAULT NULL COMMENT '日期',
  `day_num` int(2) DEFAULT NULL COMMENT '每周第n天1-7周一到周日',
  `create_time` int(10) unsigned DEFAULT NULL,
  `update_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of th_daily_task
-- ----------------------------
INSERT INTO `th_daily_task` VALUES ('3', '3', 'DWZ组件前端JS编码\r\n...', '2014-03-07', '5', '1394165878', '1395973374');
INSERT INTO `th_daily_task` VALUES ('4', '2', '1）Hibernate + Spring + Struts2 + jUI整合应用\r\n2）Mybatis + SpringMVC + Sitemesh + jUI整合应用', '2014-03-06', '4', '1394165905', '1395973145');
INSERT INTO `th_daily_task` VALUES ('6', '4', '休假', '2014-03-07', '5', '1394184221', '1394256528');
INSERT INTO `th_daily_task` VALUES ('7', '4', '1）DWZ界面设计\r\n2）视觉设计\r\n3）DWZ组件HTML结构定义', '2014-03-03', '1', '1394256340', '1395973276');
INSERT INTO `th_daily_task` VALUES ('8', '4', 'DWZ组件设计\r\n...', '2014-03-04', '2', '1394256383', '1395973248');
INSERT INTO `th_daily_task` VALUES ('9', '4', '1）DWZ组件结构定义\r\n2）DWZ组件操作行为定义\r\n...', '2014-03-05', '3', '1394256459', '1395973329');
INSERT INTO `th_daily_task` VALUES ('10', '4', '1）DWZ组件HTML结构\r\n2）DWZ组件CSS\r\n...', '2014-03-06', '4', '1394256502', '1395973343');
INSERT INTO `th_daily_task` VALUES ('11', '3', '1）DWZ组件前端JS编码\r\n2）grid组件\r\n3）tree组件\r\n4）dialog组件\r\n5）DWZ 拖动事件\r\n6）combox组件', '2014-03-03', '1', '1394256575', '1395973286');
INSERT INTO `th_daily_task` VALUES ('12', '3', 'DWZ组件前端JS编码\r\n...', '2014-03-04', '2', '1394256587', '1395973311');
INSERT INTO `th_daily_task` VALUES ('13', '3', 'DWZ组件前端JS编码\r\n...', '2014-03-05', '3', '1394256594', '1395973357');
INSERT INTO `th_daily_task` VALUES ('14', '3', 'DWZ组件前端JS编码\r\n...', '2014-03-06', '4', '1394256610', '1395973365');
INSERT INTO `th_daily_task` VALUES ('15', '2', '1）DWZ组件前端JS编码\r\n2）dwz.core.js\r\n3）Ajax表单提交、交互相关\r\n4）Ajax分页组件、局部刷新\r\n5）DWZ日历控件\r\n6）navTab组件\r\n7）alertMsg组件\r\n8）contextmenu右键菜单', '2014-03-03', '1', '1394256642', '1395973298');
INSERT INTO `th_daily_task` VALUES ('16', '2', 'DWZ组件前端JS编码\r\n...', '2014-03-04', '2', '1394256665', '1395973404');
INSERT INTO `th_daily_task` VALUES ('17', '2', 'DWZ组件前端JS编码\r\n...', '2014-03-05', '3', '1394256671', '1395973388');
INSERT INTO `th_daily_task` VALUES ('18', '2', '1）ThinkPHP + jUI整合应用\r\n2）Zend Framework + jUI整合应用', '2014-03-07', '5', '1394256819', '1395973170');
INSERT INTO `th_daily_task` VALUES ('19', '2', 'PHP开发DWZ工作日志系统', '2014-03-08', '6', '1394256889', '1395138872');
INSERT INTO `th_daily_task` VALUES ('20', '2', '1）research C++ TinyXML parse an XML form string\r\n2）调整iQ-Energy App离线计算接口，把参数传递xmlPath改成xmlContent\r\n3）协助iQ-Energy App离线计算C++接口定义\r\n4）起草技术培训计划\r\n5）起草计算引擎技术支持计划', '2014-05-31', '6', '1401509890', '1401509897');
INSERT INTO `th_daily_task` VALUES ('21', '2', '#DWZ工作日志系统手机版\n1）服务端\n2）客户端', '2014-08-31', '7', '1409454130', '1409525926');

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
  `goods_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `cat_id` int(8) NOT NULL DEFAULT '0' COMMENT '分类id',
  `goods_no` varchar(20) NOT NULL DEFAULT '0' COMMENT '商品货号',
  `brand` varchar(10) NOT NULL COMMENT '品名',
  `goodsfrom` varchar(10) NOT NULL COMMENT '商品来源',
  `goodsname` varchar(20) NOT NULL COMMENT '商品名称',
  `text` text COMMENT '富文本信息',
  `qty` int(4) NOT NULL DEFAULT '0' COMMENT '购买数量',
  `unit` varchar(3) NOT NULL COMMENT '单位（如件、只、箱等）',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '购买价格',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
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
-- Table structure for th_modules
-- ----------------------------
DROP TABLE IF EXISTS `th_modules`;
CREATE TABLE `th_modules` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `moduleName` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of th_modules
-- ----------------------------
INSERT INTO `th_modules` VALUES ('1', '会员管理');
INSERT INTO `th_modules` VALUES ('2', '后台管理');
INSERT INTO `th_modules` VALUES ('3', '权限管理');
INSERT INTO `th_modules` VALUES ('4', '其他');

-- ----------------------------
-- Table structure for th_money_log
-- ----------------------------
DROP TABLE IF EXISTS `th_money_log`;
CREATE TABLE `th_money_log` (
  `mon_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL DEFAULT '0' COMMENT '用户id',
  `orderid` varchar(20) DEFAULT '0' COMMENT '订单号',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '资金',
  `content` varchar(50) NOT NULL COMMENT '备注',
  `condition` varchar(4) NOT NULL COMMENT '收支情况 收入还是支出',
  `status` varchar(8) NOT NULL COMMENT '交易状态',
  `addtime` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`mon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='资金明细';

-- ----------------------------
-- Records of th_money_log
-- ----------------------------
INSERT INTO `th_money_log` VALUES ('1', '0', '0', '1000.00', '充值', '收入', '交易成功', '1458699326');
INSERT INTO `th_money_log` VALUES ('2', '0', '20160313', '1000.00', '充值', '收入', '交易成功', '1458699326');
INSERT INTO `th_money_log` VALUES ('3', '1', '20160313', '1000.00', '充值', '收入', '交易成功', '1458699326');

-- ----------------------------
-- Table structure for th_node
-- ----------------------------
DROP TABLE IF EXISTS `th_node`;
CREATE TABLE `th_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `group_id` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of th_node
-- ----------------------------
INSERT INTO `th_node` VALUES ('49', 'read', '查看', '1', '', null, '30', '3', '0', '0');
INSERT INTO `th_node` VALUES ('40', 'Index', '默认模块', '1', '', '0', '1', '2', '0', '0');
INSERT INTO `th_node` VALUES ('39', 'index', '列表', '1', '', null, '30', '3', '0', '0');
INSERT INTO `th_node` VALUES ('37', 'resume', '恢复', '1', '', null, '30', '3', '0', '0');
INSERT INTO `th_node` VALUES ('36', 'forbid', '禁用', '1', '', null, '30', '3', '0', '0');
INSERT INTO `th_node` VALUES ('35', 'foreverdelete', '删除', '1', '', null, '30', '3', '0', '0');
INSERT INTO `th_node` VALUES ('34', 'update', '更新', '1', '', null, '30', '3', '0', '0');
INSERT INTO `th_node` VALUES ('33', 'edit', '编辑', '1', '', null, '30', '3', '0', '0');
INSERT INTO `th_node` VALUES ('32', 'insert', '写入', '1', '', null, '30', '3', '0', '0');
INSERT INTO `th_node` VALUES ('31', 'add', '新增', '1', '', null, '30', '3', '0', '0');
INSERT INTO `th_node` VALUES ('30', 'Public', '公共模块', '1', '', '0', '1', '2', '0', '0');
INSERT INTO `th_node` VALUES ('7', 'User', '后台用户', '1', '', '4', '1', '2', '0', '2');
INSERT INTO `th_node` VALUES ('6', 'Role', '角色管理', '1', '', '3', '1', '2', '0', '2');
INSERT INTO `th_node` VALUES ('2', 'Node', '节点管理', '1', '', '2', '1', '2', '0', '2');
INSERT INTO `th_node` VALUES ('1', 'Admin', '后台管理', '1', '', null, '0', '1', '0', '0');
INSERT INTO `th_node` VALUES ('50', 'main', '空白首页', '1', '', null, '40', '3', '0', '0');
INSERT INTO `th_node` VALUES ('84', 'DailyTask', '工作日志', '1', '每日工作日志', '1', '1', '2', '0', '2');
INSERT INTO `th_node` VALUES ('85', 'weeklyReport', '小组周报', '1', '小组全部成员周报汇总', null, '84', '3', '0', '0');
INSERT INTO `th_node` VALUES ('86', 'monthlyReport', '组员月报', '1', '每个组员月报', null, '84', '3', '0', '0');
INSERT INTO `th_node` VALUES ('87', 'weeksByYear', '周列表', '1', '列出一年全部周', null, '84', '3', '0', '0');
INSERT INTO `th_node` VALUES ('88', 'SystemDB', '数据库管理', '1', '', '0', '1', '2', '0', '0');
INSERT INTO `th_node` VALUES ('89', 'backupDB', '数据库备份', '1', '', null, '88', '3', '0', '0');
INSERT INTO `th_node` VALUES ('90', 'editWeekSummary', '周总结编辑页面', '1', '', null, '84', '3', '0', '0');
INSERT INTO `th_node` VALUES ('91', 'updateWeekSummary', '编辑周总结', '1', '', null, '84', '3', '0', '0');

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
INSERT INTO `th_orders` VALUES ('11', '20160312', '3', '0', '0000', '3', '0', '0', '0.00', '0.00', 'RMB', null, '张三', null, '0.00', '福州鼓楼', '15312301238', null, null, null, '0', '1458097655', '1458097655');
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
  `goodsname` varchar(20) DEFAULT NULL COMMENT '商品名称',
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
  `startpoint` varchar(10) DEFAULT NULL COMMENT '出发地',
  `endpoint` varchar(10) DEFAULT NULL COMMENT '目的地',
  `firstprice` decimal(10,2) DEFAULT NULL COMMENT '首重价格',
  `nextprice` decimal(10,2) DEFAULT NULL COMMENT '续重价格',
  `day` tinyint(1) DEFAULT NULL COMMENT '到达天数',
  `firstheavy` tinyint(1) DEFAULT NULL COMMENT '首重',
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
  `orderid` varchar(20) NOT NULL DEFAULT '0' COMMENT '订单编号',
  `proamount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '优惠价格',
  `proremark` varchar(50) NOT NULL DEFAULT '0' COMMENT '说明',
  `usetime` int(10) NOT NULL DEFAULT '0' COMMENT '使用时间',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='优惠活动表';

-- ----------------------------
-- Records of th_promotions
-- ----------------------------

-- ----------------------------
-- Table structure for th_user
-- ----------------------------
DROP TABLE IF EXISTS `th_user`;
CREATE TABLE `th_user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(64) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `bind_account` varchar(50) NOT NULL,
  `last_login_time` int(11) unsigned DEFAULT '0',
  `last_login_ip` varchar(40) DEFAULT NULL,
  `login_count` mediumint(8) unsigned DEFAULT '0',
  `verify` varchar(32) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT '',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `type_id` tinyint(2) unsigned DEFAULT '0',
  `info` text NOT NULL,
  `department` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of th_user
-- ----------------------------
INSERT INTO `th_user` VALUES ('1', 'admin', '管理员', '21232f297a57a5a743894a0e4a801fc3', '', '1409295634', '127.0.0.1', '16', '8888', 'support@j-ui.com', null, '备注信息', '1222907803', '1239977420', '1', '0', '', null);
INSERT INTO `th_user` VALUES ('2', 'z', '张慧华', 'e10adc3949ba59abbe56e057f20f883e', '', '1409787273', '127.0.0.1', '22', null, 'z@j-ui.com', '350863780', '13621397091', '1393949054', '1413165671', '1', '0', '', '1');
INSERT INTO `th_user` VALUES ('3', 'w', '吴平', 'e10adc3949ba59abbe56e057f20f883e', '', '1394200646', '127.0.0.1', '0', null, 'w@j-ui.com', '465046815', '', '1393949111', '1394160531', '1', '0', '', '1');
INSERT INTO `th_user` VALUES ('4', 'd', '杜权', 'e10adc3949ba59abbe56e057f20f883e', '', '1394173966', '127.0.0.1', '0', null, 'd@j-ui.com', '8560685', '', '1394173790', '0', '1', '0', '', '1');

-- ----------------------------
-- Table structure for th_users
-- ----------------------------
DROP TABLE IF EXISTS `th_users`;
CREATE TABLE `th_users` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `distributorid` int(10) NOT NULL COMMENT '商家编号',
  `username` varchar(20) NOT NULL DEFAULT '0' COMMENT '用户名',
  `password` varchar(32) NOT NULL DEFAULT '0' COMMENT '密码',
  `key` varchar(30) NOT NULL COMMENT '商家秘钥',
  `code` varchar(30) NOT NULL DEFAULT '0' COMMENT '效验码',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '用户资金',
  `validitytime` int(10) NOT NULL DEFAULT '0' COMMENT '有效时间',
  `vhecktime` int(10) NOT NULL DEFAULT '0' COMMENT '检测时间',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '注册时间',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `distributorId` (`distributorid`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of th_users
-- ----------------------------
INSERT INTO `th_users` VALUES ('1', '3', 'test123456', 'e10adc3949ba59abbe56e057f20f883e', 'test123456', '123', '0.00', '16070400', '1457684736', '1457684736');
INSERT INTO `th_users` VALUES ('3', '2', 'test', 'e10adc3949ba59abbe56e057f20f883e', 'test123457', '123', '0.00', '16070400', '1457684736', '1457684736');
INSERT INTO `th_users` VALUES ('4', '1', 'hb', 'e10adc3949ba59abbe56e057f20f883e', 'test123458', '123', '0.00', '16070400', '1457684736', '1457684736');

-- ----------------------------
-- Table structure for th_week_summary
-- ----------------------------
DROP TABLE IF EXISTS `th_week_summary`;
CREATE TABLE `th_week_summary` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '周总结ID',
  `department` varchar(50) DEFAULT NULL COMMENT '部门',
  `content` text COMMENT '日志内容',
  `week_date` date DEFAULT NULL COMMENT '每周一日期',
  `create_time` int(10) unsigned DEFAULT NULL,
  `update_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of th_week_summary
-- ----------------------------
INSERT INTO `th_week_summary` VALUES ('1', '1', '1) test1\r\n2) test2\r\n3) test3', '2014-03-31', '1396319989', '1396320020');
INSERT INTO `th_week_summary` VALUES ('2', '1', 'DWZ jUI\r\nDWZ+Java\r\nDWZ+PHP', '2014-03-03', '1396320373', null);
