#
# Table structure for table 'tx_couch_domain_model_couch'
#
CREATE TABLE tx_couch_domain_model_couch (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	description text NOT NULL,
	begin int(11) DEFAULT '0' NOT NULL,
    end int(11) DEFAULT '0' NOT NULL,
	space int(11) DEFAULT '0' NOT NULL,
	provider int(11) unsigned DEFAULT '0' NOT NULL,
	address int(11) unsigned DEFAULT '0',
	categories int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (

	couch int(11) unsigned DEFAULT '0' NOT NULL,

	tx_extbase_type varchar(255) DEFAULT '' NOT NULL,

);

#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (

	couch  int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_couch_domain_model_couch'
#
CREATE TABLE tx_couch_domain_model_couch (
	categories int(11) unsigned DEFAULT '0' NOT NULL,
);
