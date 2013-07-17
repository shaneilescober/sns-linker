CREATE TABLE IF NOT EXISTS `snslinker_setting` (
		`idx` int(11) NOT NULL auto_increment,
		`pss_count` int(11) NOT NULL,
		`pss_title` varchar(20) NOT NULL,
		`pss_content` varchar(100) NOT NULL,
		PRIMARY KEY  (`idx`));
		

CREATE TABLE IF NOT EXISTS `snslinker_list` (
		`idx` int(11) NOT NULL auto_increment,
		`ps_title` varchar(20) NOT NULL,
		`ps_image` varchar(250) NOT NULL,
		`ps_regdate` timestamp NOT NULL default CURRENT_TIMESTAMP,
		`ps_link_address` varchar(50) NOT NULL,
		PRIMARY KEY  (`idx`));
