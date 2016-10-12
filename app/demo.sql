CREATE TABLE users (
    id INT AUTO_INCREMENT NOT NULL,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

INSERT INTO `users` (`id`, `firstName`, `lastName`) VALUES
    (NULL, 'Bruce', 'BANNER'),
    (NULL, 'Peter', 'PARKER'),
    (NULL, 'Tony', 'STARK'),
    (NULL, 'Jessica', 'JONES')
;
