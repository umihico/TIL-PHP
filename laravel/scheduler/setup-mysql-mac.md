```
$ mysql.server start
$ mysql -uroot -p
Enter password: #empty
mysql> create database laraveldb;
mysql> show databases;
mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '';
$ php artisan migrate
```
