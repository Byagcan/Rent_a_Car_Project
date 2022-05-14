use web_project;
CREATE TABLE `car_details` (
  `carid` INT NOT NULL AUTO_INCREMENT,
  `carnameid` INT NOT NULL,
  `brandid` INT NOT NULL,
  `carimageid` int NOT NULL,
  `segmentid` INT NOT NULL,
  `description` varchar(200) NOT NULL,
  `capacity` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `gears` varchar(45) NOT NULL,
  `status` INT NOT NULL,
  `price` INT NOT NULL,
  `branchid` int NOT NULL,
  PRIMARY KEY (`carid`),
  FOREIGN KEY (segmentid) REFERENCES car_segment(segmentid),
  FOREIGN KEY (carnameid) REFERENCES car_name(carnameid),
  FOREIGN KEY (brandid) REFERENCES car_brand(brandid),
  FOREIGN KEY (carimageid) REFERENCES car_image(carimageid),
  FOREIGN KEY (branchid) REFERENCES branch(branchid)
) ENGINE=InnoDB ;