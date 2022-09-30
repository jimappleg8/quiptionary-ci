SELECT DISTINCT(SourceID), SourceDate, Author, SourceDescription, Verified, Source
FROM definitions
WHERE SourceId IS NOT NULL
ORDER BY SourceID


CREATE TABLE `definitions` (
  `id` int(11) UNSIGNED NOT NULL,
  `entry_word` varchar(255) NOT NULL,
  `part_of_speech` varchar(20) NOT NULL,
  `plural` varchar(1) NOT NULL,
  `definition` text NOT NULL,
  `original_quote` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `verified` varchar(1) NOT NULL,
  `source_id` varchar(10) NOT NULL,
  `source_date` varchar(10) NOT NULL,
  `source_description` text NOT NULL,
  `other_sources` varchar(255) NOT NULL,
  `definition_type` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `context` varchar(255) NOT NULL,
  `foreign` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `sort` varchar(255) NOT NULL,
  `game` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# -----------------------------------------------------------

CREATE TABLE `definition_index` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT ,
  `definition_id` int(11) unsigned NOT NULL ,
  `word` varchar(255) NOT NULL ,
  `weight` int(11) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

# -----------------------------------------------------------

CREATE TABLE `sources` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `verified` varchar(1) NOT NULL ,
  `source_date` varchar(10) NOT NULL ,
  `description` text NOT NULL ,
  `citation` text NOT NULL ,
  `author` varchar(255) NOT NULL ,
  `source` varchar(255) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

# -----------------------------------------------------------

CREATE TABLE `authors` ( 
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , 
  `name` VARCHAR(255) NOT NULL , 
  `short_bio` VARCHAR(255) NOT NULL , 
  `birth_date` DATE NULL , 
  `death_date` DATE NULL , 
  PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

# -----------------------------------------------------------

CREATE TABLE `source_authors` (
  `source_id` INT(11) UNSIGNED NOT NULL ,
  `author_id` INT(11) UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

# -----------------------------------------------------------

CREATE TABLE `words` (
  `word` varchar(255) NOT NULL ,
  `pronunciation` varchar(255) NOT NULL ,
  `syllables` varchar(255) NOT NULL 
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;

# -----------------------------------------------------------

CREATE TABLE `definition_source` (
  `definition_id` int(11) UNSIGNED NOT NULL ,
  `source_id` int(11) UNSIGNED NOT NULL ,
  `notes` text NOT NULL ,
  `verified` varchar(1) NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;




