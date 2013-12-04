CREATE DATABASE IF NOT EXISTS `cms20131119` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `cms20131119`;

CREATE TABLE IF NOT EXISTS `cms_passage`  #passage
(
	pid int not null auto_increment primary key,    #passage id
	ptitle_zh char(60) not null comment 'passage title',
	ptitle_en char(60) not null comment 'passage title',
	pclick int not null default 0 comment '文章浏览次数',
	paddtime timestamp not null comment '添加文章的时间',
	cid int not null comment '文章所属的栏目ID',
	vip int not null default 0 comment '何种对象可以阅读',
	pverify int not null default 1 comment '是否审核，默认审核',
	precycle int not null default 1 comment '1为不在回收站，0为在回收站',
	psugesstion char(20) not null comment '推荐到哪里'
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `cms_pcontent`  #passage content
(
	pcid int not null auto_increment primary key comment 'content id',
	pid int not null comment 'passage id',
	summary_zh char(240) not null comment 'summary',
	summary_en char(240) not null comment 'summary',
	content_zh mediumtext not null comment 'content zh',
	content_en mediumtext not null comment 'content en'
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS cms_comment
(
	cid int not null auto_increment primary key,
	pid int not null comment 'passage id',
	poster char(24) not null comment '评论者',
	cip char(17) not null default '0.0.0.0' comment '评论者ip',
	caddtime timestamp not null comment '留言时间',
	verify int not null default 0 comment '是否审核',
	crecycle int not null default 1 comment '1为不在回收站，0为在回收站'
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS cms_member
(
	userid int not null auto_increment primary key,
	username char(24) not null,
	regaddtime timestamp not null comment '注册时间',
	upasswd char(50) not null comment '密码',
	uemail char(30) not null comment '接收密码邮箱',
	emailview tinyint not null default 0 comment '是否显示邮箱，0为不显示',
	activity tinyint not null default 0 comment '账户状态1为启用，0为停用'
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS cms_category
(
	catid int not null auto_increment primary key,
	cattitle_zh char(18) not null comment 'title',
	catitle_en char(18) not null comment 'title en',
	cattype int not null default 0 comment '栏目类型'
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

GRANT SELECT,UPDATE,DELETE,INSERT 
ON cms20131119.*
TO cms20131119@localhost IDENTIFIED BY 'password';



	
