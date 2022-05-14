use web_project;
CREATE TABLE `rents` (
  `rentid` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `carid` int NOT NULL,
  `purchase_date` date NOT NULL,
  `return_date` date NOT NULL,
  `rent_date` date NOT NULL,
  `totalprice` int NOT NULL,
  `creditid` int NOT NULL,
  PRIMARY KEY (`rentid`),
  FOREIGN KEY (userid) REFERENCES user_details(userid),
  FOREIGN KEY (carid) REFERENCES car_details(carid),
  FOREIGN KEY (creditid) REFERENCES credit_card(creditid)
) ENGINE=InnoDB ;