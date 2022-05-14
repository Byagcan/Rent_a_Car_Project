use web_project;
CREATE TABLE `user_details` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `name_surname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `personal_id` varchar(45) DEFAULT NULL,
  `registrationdate` date NOT NULL,
  `image` varchar(45) ,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `password_UNIQUE` (`password`),
  UNIQUE KEY `phone_number_UNIQUE` (`phone_number`),
  UNIQUE KEY `personal_id_UNIQUE` (`personal_id`)
) ENGINE=InnoDB ;