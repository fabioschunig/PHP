--------
-- MySQL
CREATE DATABASE task_rest_api;

use task_rest_api;

CREATE TABLE `task` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(256) COLLATE utf8mb4_unicode_ci NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
