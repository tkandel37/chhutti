
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




DROP TABLE IF EXISTS `roomdetail`;
CREATE TABLE IF NOT EXISTS `roomdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `no_of_room` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;



INSERT INTO `roomdetail` (`id`, `username`, `checkin_date`, `checkout_date`, `room_type`, `no_of_room`, `amount`) VALUES
(2, 'joy@mendis.com', '2014-06-16', '2014-06-20', '250', '5', '1250');



DROP TABLE IF EXISTS `roomtype`;
CREATE TABLE IF NOT EXISTS `roomtype` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(50) NOT NULL,
  `room_price` varchar(50) NOT NULL,
  `room_seson` varchar(50) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;



INSERT INTO `roomtype` (`room_id`, `room_type`, `room_price`, `room_seson`) VALUES
(1, 'Garden view', '2000', 'low season'),
(2, 'Garden view', '2000', 'high season'),
(3, 'Street view', '1500', 'low season'),
(4, 'Street view', '1500', 'high season'),
(5, 'Sunrise view', '2500', 'low season'),
(6, 'Sunrise view', '2500', 'high season');



DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `day_phone` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;



INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `day_phone`, `user_name`, `user_password`, `city`, `country`, `payment_type`) VALUES
(1, 'joy', 'mendis', '8123432111', 'joy@mendis.com', '12345', 'ontario', 'canada', 'paypal');
COMMIT;

