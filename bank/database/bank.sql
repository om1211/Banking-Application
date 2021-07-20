CREATE TABLE IF NOT EXISTS `customer` (
  `id` INT(144) NOT NULL UNIQUE ,
  `name` VARCHAR(1000) NOT NULL,
  `number` VARCHAR(1000) not null,
  `email` VARCHAR(1000) NOT NULL UNIQUE,
  `balance` VARCHAR(10000)
);

CREATE TABLE IF NOT EXISTS `transfer`(
  `sender` VARCHAR(1000) NOT NULL,
  `receiver` VARCHAR(1000) NOT NULL,
  `amount` VARCHAR(1000) NOT NULL
);

INSERT INTO `customer`(`id`,`name`,  `number`, `email`, `balance`) VALUES (1,"Om Bothe","9561195892","om1211@gmail.com","7000");
INSERT INTO `customer`(`id`,`name`,  `number`, `email`, `balance`) VALUES (2,"Shubham Barge","8767593235","shub07@gmail.com","1100");
INSERT INTO `customer`(`id`,`name`,  `number`, `email`, `balance`) VALUES (3,"Prajwal Deokar","9566421589","pajdeo@gmail.com","1400");
INSERT INTO `customer`(`id`,`name`,  `number`, `email`, `balance`) VALUES (4,"Yogesh Borhade","9136535783","kalakk89@gmail.com","6500");
INSERT INTO `customer`(`id`,`name`,  `number`, `email`, `balance`) VALUES (5,"Pancham Bodkhe","7552369585","pan54@gmail.com","8454");
INSERT INTO `customer`(`id`,`name`,  `number`, `email`, `balance`) VALUES (6,"Gauri Ade","9822737811","gade55@gmail.com","3500");
INSERT INTO `customer`(`id`,`name`,  `number`, `email`, `balance`) VALUES (7,"Pranjal H","9887617788","praj123@gmail.com","3998");
INSERT INTO `customer`(`id`,`name`,  `number`, `email`, `balance`) VALUES (8,"Rahul Bodkhe","9665257882","rahzhul@gmail.com","8202");
INSERT INTO `customer`(`id`,`name`,  `number`, `email`, `balance`) VALUES (9,"Ajit dalvi","9109289295","aji@gmail.com","3100");
INSERT INTO `customer`(`id`,`name`,  `number`, `email`, `balance`) VALUES (10,"Sk Kothule","9877772882","skheart@gmail.com","2000");

ALTER TABLE `customer`
MODIFY `id` INT(144) NOT NULL AUTO_INCREMENT;
