CREATE TABLE `url_http_status_code_log` (
    `url_http_status_code_log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `url` varchar(255) NOT NULL,
    `http_status_code` INT(3) NOT NULL,
    `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (`url_http_status_code_log_id`),
    INDEX (`url`),
    INDEX (`http_status_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
