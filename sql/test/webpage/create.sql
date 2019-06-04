CREATE TABLE `webpage` (
    `webpage_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `website_id` int(10) unsigned DEFAULT NULL,
    `url` VARCHAR(255) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `html` MEDIUMTEXT,
    PRIMARY KEY (`webpage_id`),
    KEY `website_id` (`website_id`),
    UNIQUE `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
