CREATE TABLE usr (
  `id`      INT(10) AUTO_INCREMENT NOT NULL,
  `name`   VARCHAR(255) NOT NULL,
  `nickname` VARCHAR(255) NOT NULL,
  `mailAddress` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `business` VARCHAR(255),
  `created_at` DATETIME NOT NULL default (CURRENT_TIMESTAMP),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO usr (name, nickname, mailAddress, password) values ("team-c", "team-c", "a@a.a", "password")
