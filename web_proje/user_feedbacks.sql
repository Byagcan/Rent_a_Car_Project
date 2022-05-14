use web_project;
CREATE TABLE `user_feedbacks` (
	`userid` int NOT NULL,
	`feedbackid` int  auto_increment,
    `feedback` varchar(250) ,
    `date` date NOT NULL,
	PRIMARY KEY (`feedbackid`),
    FOREIGN KEY (userid) REFERENCES user_details(userid)
) ENGINE=InnoDB ;