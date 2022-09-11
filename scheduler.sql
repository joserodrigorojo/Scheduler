CREATE TABLE `calendars` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `text` varchar(45) NOT NULL,
  `color` varchar(45) NOT NULL,
  `active` int NOT NULL
);

CREATE TABLE `events` (
  `start_date` datetime NOT NULL DEFAULT (CURRENT_TIMESTAMP),
  `end_date` datetime NOT NULL DEFAULT (CURRENT_TIMESTAMP),
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `text` varchar(105) DEFAULT NULL,
  `details` varchar(105) DEFAULT NULL,
  `color` varchar(45) DEFAULT "#00000",
  `section` varchar(45) DEFAULT NULL,
  `units` varchar(45) DEFAULT NULL,
  `calendar` int NOT NULL DEFAULT "1",
  `all_day` int DEFAULT "0",
  `recurring` varchar(45) DEFAULT NULL,
  `origin_id` varchar(45) DEFAULT NULL
);

CREATE TABLE `sections` (
  `text` varchar(45) NOT NULL,
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT
);

CREATE TABLE `units` (
  `id` int PRIMARY KEY NOT NULL,
  `value` varchar(45) NOT NULL
);

CREATE INDEX `events_fk_idx` ON `events` (`calendar`);

ALTER TABLE `events` ADD CONSTRAINT `events_fk` FOREIGN KEY (`calendar`) REFERENCES `calendars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
