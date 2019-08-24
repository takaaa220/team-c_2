CREATE TABLE talent_category (
  `id`      INT(10) AUTO_INCREMENT NOT NULL,
  `talent_id` INT(10) NOT NULL,
  `category` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NOT NULL default (CURRENT_TIMESTAMP),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
