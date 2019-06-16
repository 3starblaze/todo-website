# todo-website
Website that tracks todo tasks!

## Required packages
* `php-mysql`
* `php`
* `mysql`

## Setup
__Note__: Names that are surrounded by __ (e.g. \_\_variable\_\_) must be replaced with your data.
1. Install required packages if they aren't installed already
2. Extract this project in folder where this website will be hosted
3. Log in mysql with account that can _make accounts_, _give privileges_ and _create databases_ (e.g. root)
4. Create database _todo_
```mysql
CREATE DATABASE todo;
```
5. Import or make table _todolist_

   * Load mysqldump in _command line_ (assuming that you are located in the root of the project)
   ```shell
   mysql -u __priviliged-username__ -p todo < mysqldump
   ```
   * Create new table
   ```mysql
   CREATE TABLE todolist (
   id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   title varchar(80) NOT NULL,
   description varchar(200) DEFAULT NULL,
   date date NOT NULL,
   is_done tinyint(1) NOT NULL);
   ```

6. In mysql _create user account_ with password
```mysql
CREATE USER '__username__'@'localhost' IDENTIFIED BY '__password__';
```

7. Grant all _privileges_ to it
```mysql
GRANT ALL PRIVILEGES on todo.* TO __username__@localhost;
```

8. Replace the following variables in __all__ php files with your data
```php
$servername = 'localhost';
$username = '__username__';
$password = '__password__';
$dbname = 'todo';
```
