CREATE TABLE offer_post (
  `id` INT(10) AUTO_INCREMENT NOT NULL,
  `type` VARCHAR(127) NOT NULL,
  `content` TEXT NOT NULL,
  `usr_id` INT(10) NOT NULL,
  `created_at` DATETIME NOT NULL default (CURRENT_TIMESTAMP),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
