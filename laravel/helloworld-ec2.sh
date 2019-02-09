# preparation
sudo yum update -y
# install php
sudo amazon-linux-extras install -y lamp-mariadb10.2-php7.2 php7.2
# install composer
curl -sS https://getcomposer.org/installer | sudo php
sudo cp composer.phar /usr/local/bin/composer
sudo ln -s /usr/local/bin/composer /usr/bin/composer
rm composer.phar
# httpd
sudo systemctl start httpd
sudo systemctl enable httpd
echo "<?php phpinfo(); ?>"|sudo tee /var/www/html/phpinfo.php
cd /var/www
systemctl restart httpd.service
sudo systemctl restart httpd.service



touch database/database.sqlite
sudo vim .env # change db to sqlite and set path to database.sqlite
sudo vim /etc/httpd/conf.d/virtualhost.conf # add below
<< COMMENTOUT
<virtualHost *:80>
  ServerName ec2.umihi.co
  DocumentRoot /var/www/html
  <directory "/var/www/html">
    AllowOverride All
    Allow from All
  </directory>
</virtualHost>
<virtualHost *:80>
  ServerName test.umihi.co
  DocumentRoot /var/www/test
  <directory "/var/www/test">
    AllowOverride All
    Allow from All
  </directory>
</virtualHost>
<virtualHost *:80>
  ServerName laravel.umihi.co
  DocumentRoot /var/www/laravel/public
  <directory "/var/www/laravel/public">
    AllowOverride All
    Allow from All
  </directory>
</virtualHost>
COMMENTOUT
cd /var/www/
sudo composer create-project --prefer-dist laravel/laravel
sudo usermod -a -G apache ec2-user
sudo chown -R ec2-user:apache /var/www
sudo chmod 2775 /var/www
find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;
sudo chmod -R 777 laravel/storage
sudo chmod -R 775 laravel/bootstrap/cache
sudo systemctl restart httpd.service
