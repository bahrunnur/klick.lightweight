CREATE TABLE IF NOT EXISTS `{PREFIX}voter` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(64) NOT NULL,
  `access_key` varchar(32) NOT NULL,
  `vote_for` smallint(2) NOT NULL,
  `vote_time` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tuples of voter';

-- slice here --

CREATE TABLE IF NOT EXISTS `{PREFIX}candidate` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(64) NOT NULL,
  `info` TEXT,
  `photo` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tuples of candidate';

-- slice here --

CREATE TABLE IF NOT EXISTS `{PREFIX}admin` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(32) NOT NULL,
  `role` enum('register', 'supervisor') NOT NULL,
  `salt` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tuples of administrator';

-- slice here --

CREATE TABLE IF NOT EXISTS `{PREFIX}election` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(64) NOT NULL,
  `start_date` int(32) NOT NULL,
  `end_date` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information about the election';

-- slice here --

INSERT INTO `{PREFIX}admin` (`id`, `username`, `password`, `email`, `role`, `salt`) VALUES
    (1, '{USERNAME}', '{PASSWORD}', '{EMAIL}', 'supervisor', '{SALT}');

-- slice here --

INSERT INTO `{PREFIX}election` (`name`, `start_date`, `end_date`) VALUES
    ('{ELECTIONNAME}', {STARTDATE}, {ENDDATE});