
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";






CREATE TABLE `bulp_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `pw_count` int(11) NOT NULL DEFAULT 0,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `bulp_users` (
  `id` int(11) NOT NULL,
  `e_mail` varchar(64) NOT NULL,
  `e_mail_validation` tinyint(1) NOT NULL DEFAULT 0,
  `password` binary(32) NOT NULL,
  `image` mediumblob DEFAULT NULL,
  `image_number` smallint(6) NOT NULL,
  `nickname` varchar(32) NOT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `bulp_validation_mails` (
  `uid` char(13) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `bulp_posts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `bulp_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_e_mail` (`e_mail`);

ALTER TABLE `bulp_validation_mails`
  ADD PRIMARY KEY (`uid`);


ALTER TABLE `bulp_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `bulp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

