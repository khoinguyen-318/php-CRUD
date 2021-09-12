# php-CRUD
PHP Create-read-update-delete
```ruby

CREATE DATABASE qlysinhvien
USE DATABASE qlysinhvien
CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `students` (
  `masv` varchar(255) NOT NULL PRIMARY KEY,
  `fullname` text NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `diem` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  ```
