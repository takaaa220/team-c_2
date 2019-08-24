CREATE TABLE talent_master (
  `id`      INT(10) AUTO_INCREMENT NOT NULL,
  `name`   VARCHAR(255) NOT NULL,
  `image_url` VARCHAR(1080),
  `memo` TEXT,
  `birthday` VARCHAR(255),
  `hometown` VARCHAR(255),
  `history` TEXT,
  `private` TEXT,
  `episode` TEXT,
  `relationship` TEXT,
  `created_at` DATETIME NOT NULL default (CURRENT_TIMESTAMP),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
