USE arno16;

-- Ensure UTF8 on the database connection
SET NAMES utf8;



--
-- Table Book
--
DROP TABLE IF EXISTS rv1_Book;
CREATE TABLE rv1_Book (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `title` VARCHAR(256) NOT NULL,
    `author` VARCHAR(256) NOT NULL,
    `published`INT NULL
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;


--
-- Table User
--
DROP TABLE IF EXISTS rv1_User;
CREATE TABLE rv1_User (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `username` VARCHAR(80) UNIQUE NOT NULL,
    `email` VARCHAR(80) UNIQUE NOT NULL,
    `password` VARCHAR(256) NOT NULL,
    `deleted` TINYINT(1) DEFAULT NULL
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;

INSERT INTO rv1_User(username, email, password) VALUES
    ("admin", "admin@admin.com", "$2y$10$scfqvrJH59WBi4UPEb..4O1.BGRgaI4fzV.NGATt0LHrV88Pa1J9a"),
    ("doe", "doe@doe.com", "$2y$10$mYK7Wc6XQeYscR4gbGFXNu7.Kc3RuDPfivO9cfnflLNw04lB5LYKS")
;

--
-- Table Comment
--
DROP TABLE IF EXISTS rv1_Comment;
CREATE TABLE rv1_Comment (
    `id` INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `post_id` INTEGER NOT NULL,
    `parent_id` INTEGER NOT NULL,
    `user` INTEGER DEFAULT NULL,
    `created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `edited` DATETIME ON UPDATE CURRENT_TIMESTAMP,
    `content` TEXT NOT NULL,
    `upvote` INTEGER NOT NULL,
    `downvote` INTEGER NOT NULL,
    `deleted` TINYINT(1) DEFAULT NULL,

    FOREIGN KEY (`user`) REFERENCES `rv1_User` (`id`) ON DELETE SET NULL
) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;
