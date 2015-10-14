CREATE TABLE `users` (
  `id` int(11)  AUTO_INCREMENT,
  `full_name` varchar(100),
  `user_name` varchar(100),
  `password` varchar(100),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `owners` (
  `id` int(11)  AUTO_INCREMENT,
  `house_number` varchar(100),
  `type_of_ownership_id` int(11),
  `full_name` varchar(100),
  `address` varchar(200),
  `birth_date` date,
  `birth_place` varchar(200),
  `citizenship` varchar(100),
  `religion` varchar(100),
  `highest_education_attainment_id` int(11),
  `years_of_residency` int(11),
  `civil_status` int(11),
  `occupation` varchar(100),
  `gender_id` int(11),
  `deleted` int(11),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `residents` (
  `id` int(11)  AUTO_INCREMENT,
  `full_name` varchar(100),
  `relationship_id` int(11),
  `birth_date` date,
  `birth_place` varchar(200),
  `civil_status` int(11),
  `years_of_residency` int(11),
  `occupation` varchar(100),
  `gender_id` int(11),
  `highest_education_attainment_id` int(11),
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

CREATE TABLE `civil_statuses` (
  `id` int(11)  AUTO_INCREMENT,
  `name` varchar(100) ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `relationships` (
  `id` int(11)  AUTO_INCREMENT,
  `name` varchar(100) ,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
