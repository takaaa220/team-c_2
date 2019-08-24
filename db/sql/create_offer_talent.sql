CREATE TABLE offer_talent (
  `id`      INT(10) AUTO_INCREMENT NOT NULL,
  `talent_id` INT(10) NOT NULL,
  `post_id` INT(10) NOT NULL,
  `created_at` DATETIME NOT NULL default (CURRENT_TIMESTAMP),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
