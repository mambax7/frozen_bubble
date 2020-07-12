# Frozen Bubble
# version 1.0
# --------------------------------------------------------

#
# Structure de la table `fb_global_time`
#

CREATE TABLE fb_global_time (
  id int(11) NOT NULL auto_increment,
  from_end tinyint(3) unsigned NOT NULL default '0',
  uid mediumint(8) unsigned NOT NULL,
  time int(10) unsigned NOT NULL default '0',
  nb_bubbles int(10) unsigned NOT NULL default '0',
  record_date timestamp(14) NOT NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;


#
# Structure de la table `fb_level_time`
#

CREATE TABLE fb_level_time (
  id int(11) NOT NULL auto_increment,
  level tinyint(3) unsigned NOT NULL default '0',
  uid mediumint(8) unsigned NOT NULL,
  time int(10) unsigned NOT NULL default '0',
  nb_bubbles int(10) unsigned NOT NULL default '0',
  record_date timestamp(14) NOT NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;
