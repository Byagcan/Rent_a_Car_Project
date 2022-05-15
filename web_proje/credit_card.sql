use web_project;
CREATE TABLE `credit_card` (
  `creditid` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL ,
  `namesurname` varchar(45) NOT NULL,
  `cardnumber` varchar(45) NOT NULL,
  `day` int NOT NULL,
  `year` int NOT NULL,
  `ccv` int NOT NULL,
  PRIMARY KEY (`creditid`),
  CONSTRAINT paymentcontrol UNIQUE(creditid,ccv),
  FOREIGN KEY (userid) REFERENCES user_details(userid)
) ENGINE=InnoDB ;