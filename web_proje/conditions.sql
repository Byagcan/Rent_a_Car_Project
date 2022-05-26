use web_project;
CREATE TABLE `conditions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(350) NOT NULL,
  `answer` varchar(350) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB ;