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

-- sample data
insert into `task` (`description`, `tags`) values ('Task 1', 'to-do'); 
insert into `task` (`description`, `tags`) values ('Task 2', 'doing');
insert into `task` (`description`, `tags`) values ('Task 3', 'done');
insert into `task` (`description`, `tags`) values ('Task 4', 'to-do');
insert into `task` (`description`, `tags`) values ('Task 5', 'to-do');
insert into `task` (`description`, `tags`) values ('Task 6', 'done');
insert into `task` (`description`, `tags`) values ('Task 7', 'to-do');
insert into `task` (`description`, `tags`) values ('Task 8', 'doing');
insert into `task` (`description`, `tags`) values ('Task 9', 'doing');
insert into `task` (`description`, `tags`) values ('Task 10', 'to-do');
insert into `task` (`description`, `tags`) values ('Task 11', 'to-do');
insert into `task` (`description`, `tags`) values ('Task 12', 'to-do');
insert into `task` (`description`, `tags`) values ('Task 13', 'doing');
insert into `task` (`description`, `tags`) values ('Task 14', 'doing');
insert into `task` (`description`, `tags`) values ('Task 15', 'to-do');
insert into `task` (`description`, `tags`) values ('Task 16', 'to-do');
insert into `task` (`description`, `tags`) values ('Task 17', 'to-do');
insert into `task` (`description`, `tags`) values ('Task 18', 'to-do');
insert into `task` (`description`, `tags`) values ('Task 19', 'done');
insert into `task` (`description`, `tags`) values ('Task 20', 'done');

commit;
