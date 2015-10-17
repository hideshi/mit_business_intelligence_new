DROP DATABASE mitbi;
CREATE DATABASE mitbi CHARSET=utf8;
use mitbi;

CREATE TABLE `users` (
  `id` int(11)  AUTO_INCREMENT,
  `full_name` varchar(100),
  `user_name` varchar(100),
  `password` varchar(100),
  `created` datetime,
  `modified` datetime,
  `deleted` int(11),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `owners` (
  `id` int(11)  AUTO_INCREMENT,
  `full_name` varchar(100),
  `address` varchar(200),
  `house_number` varchar(100),
  `type_of_ownership_id` int(11),
  `birth_date` date,
  `birth_place` varchar(200),
  `citizenship` varchar(100),
  `religion` varchar(100),
  `occupation` varchar(100),
  `years_of_residency` int(11),
  `gender_id` int(11),
  `status_id` int(11) DEFAULT 1,
  `civil_status_id` int(11),
  `house_status_id` int(11) DEFAULT 1,
  `highest_education_attainment_id` int(11),
  `created` datetime,
  `modified` datetime,
  `deleted` int(11),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `residents` (
  `id` int(11)  AUTO_INCREMENT,
  `full_name` varchar(100),
  `relationship_id` int(11),
  `birth_date` date,
  `birth_place` varchar(200),
  `citizenship` varchar(100),
  `religion` varchar(100),
  `occupation` varchar(100),
  `years_of_residency` int(11),
  `gender_id` int(11),
  `status_id` int(11) DEFAULT 1,
  `civil_status_id` int(11),
  `highest_education_attainment_id` int(11),
  `created` datetime,
  `modified` datetime,
  `deleted` int(11),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `owner_residents` (
  `id` int(11)  AUTO_INCREMENT,
  `owner_id` int(11),
  `resident_id` int(11),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `genders` (
  `id` int(11)  AUTO_INCREMENT,
  `name` varchar(100) ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ownerships` (
  `id` int(11)  AUTO_INCREMENT,
  `name` varchar(100) ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `educations` (
  `id` int(11)  AUTO_INCREMENT,
  `name` varchar(100) ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `statuses` (
  `id` int(11)  AUTO_INCREMENT,
  `name` varchar(100) ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `civil_statuses` (
  `id` int(11)  AUTO_INCREMENT,
  `name` varchar(100) ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `house_statuses` (
  `id` int(11)  AUTO_INCREMENT,
  `name` varchar(100) ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `relationships` (
  `id` int(11)  AUTO_INCREMENT,
  `genre` int(11),
  `name` varchar(100) ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `options` (
  `id` int(11)  AUTO_INCREMENT,
  `genre` int(11),
  `name` varchar(100) ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `operators` (
  `id` int(11)  AUTO_INCREMENT,
  `genre` int(11),
  `name` varchar(100) ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* password is admin */
INSERT INTO users (full_name, user_name, password) VALUES ('Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO genders (name)VALUES('Male');
INSERT INTO genders (name)VALUES('Female');
INSERT INTO ownerships (name)VALUES('Owned');
INSERT INTO ownerships (name)VALUES('Rented');
INSERT INTO educations (name)VALUES('Elementary');
INSERT INTO educations (name)VALUES('High School');
INSERT INTO educations (name)VALUES('College');
INSERT INTO educations (name)VALUES('Post College');
INSERT INTO statuses (name)VALUES('Alive');
INSERT INTO statuses (name)VALUES('Deceased');
INSERT INTO civil_statuses (name)VALUES('Single');
INSERT INTO civil_statuses (name)VALUES('Married');
INSERT INTO civil_statuses (name)VALUES('Widowed');
INSERT INTO civil_statuses (name)VALUES('Separated');
INSERT INTO house_statuses (name)VALUES('Active');
INSERT INTO house_statuses (name)VALUES('Inactive');
INSERT INTO relationships (genre, name)VALUES(1, 'Father');
INSERT INTO relationships (genre, name)VALUES(1, 'Mother');
INSERT INTO relationships (genre, name)VALUES(1, 'Sister');
INSERT INTO relationships (genre, name)VALUES(1, 'Brother');
INSERT INTO relationships (genre, name)VALUES(1, 'Cousin');
INSERT INTO relationships (genre, name)VALUES(1, 'GrandFather');
INSERT INTO relationships (genre, name)VALUES(1, 'GrandMother');
INSERT INTO relationships (genre, name)VALUES(1, 'Sister-in-law');
INSERT INTO relationships (genre, name)VALUES(1, 'Brother-in-law');
INSERT INTO relationships (genre, name)VALUES(1, 'Son-in-law');
INSERT INTO relationships (genre, name)VALUES(1, 'Daughter-in-law');
INSERT INTO relationships (genre, name)VALUES(2, 'Boarder');
INSERT INTO relationships (genre, name)VALUES(2, 'Helper');
INSERT INTO options (genre, name)VALUES(1, 'Full Name');
INSERT INTO options (genre, name)VALUES(2, 'Birth Date');
INSERT INTO options (genre, name)VALUES(1, 'Birth Place');
INSERT INTO options (genre, name)VALUES(1, 'Gender');
INSERT INTO options (genre, name)VALUES(1, 'Civil Status');
INSERT INTO options (genre, name)VALUES(1, 'Occupation');
INSERT INTO options (genre, name)VALUES(2, 'Years of Residency');
INSERT INTO operators (genre, name)VALUES(1, 'Equal To');
INSERT INTO operators (genre, name)VALUES(2, 'Greater Than');
INSERT INTO operators (genre, name)VALUES(2, 'Less Than');
