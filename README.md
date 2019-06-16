# todo-website
Website that tracks todo tasks!

## Required packages
* `php-mysql`
* `php`
* `mysql`

## Setup
__Note__: Names that are surrounded by __ (e.g. \_\_variable__) must be replaced with your data.
1. Install required packages if they aren't installed already
2. Extract this project in folder where this website will be hosted
3. Log in mysql with account that can make accounts, give privileges and create databases (e.g. root)
4. Create database todo
```mysql
CREATE DATABASE todo;
```
5. Import or make table todolist

   __Importing table from mysql dump file__ (Assuming that you are located in the root of the project)
   
   1. Load mysqldump in _commandline_
   ```shell
   mysql -u __priviliged-username__ -p todo < mysqldump
   ```
   2. 
     CREATE TABLE todolist (
    'id' int(11) NOT NULL AUTO_INCREMENT,
    'title' varchar(80) NOT NULL,
    'description' varchar(200) DEFAULT NULL,
    'date' date NOT NULL,
    'is_done' tinyint(1) NOT NULL)


6. In mysql create user account with password by command:
```mysql
CREATE USER '__username__'@'localhost' IDENTIFIED BY '__password__';
```
