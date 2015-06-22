CREATE DATABASE `bootstrap` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `bootstrap`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE USER 'bootstrap'@'localhost' IDENTIFIED BY 'password';
GRANT ALL ON bootstrap.* TO 'bootstrap'@'localhost';

INSERT INTO `users` (
	`name`,
	`email`,
	`password`
) VALUES (
	'Pinco Pallino',
	'pinco.pallino@libero.it',
	'123456'
);