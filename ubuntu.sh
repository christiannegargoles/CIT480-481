#! /bin/bash

#install apache
sudo apt update
sudo apt upgrade -y
sudo apt install apache2 -y

#firewall
sudo ufw enable -y
sudo ufw allow 'Apache Full'
sudo ufw allow 'ssh'


#directory configuration
sudo mkdir /var/www/mect
sudo chown -R $USER:$USER /var/www/mect
sudo chmod -R 755 /var/www/mect

#git
git clone https://github.com/christiannegargoles/CIT480-481.git
#chmod +x /home/ubuntu/CIT480-481/apache.sh
cp -a CIT480-481/. /var/www/mect

#make .conf file (vhost)
sudo cp CIT480-481/mect.conf /etc/apache2/sites-available
sudo a2ensite mect.conf
sudo a2dissite 000-default.conf

#php/mysql
sudo apt install php libapache2-mod-php -y
sudo apt install php-mysql -y
sudo apt install mysql-client-core-8.0
sudo systemctl restart apache2

#install snap + certbot
sudo apt update
sudo apt install snapd
sudo snap install core
sudo snap refresh core
sudo snap install --classic certbot
sudo ln -s /snap/bin/certbot /usr/bin/certbot
#sudo certbot --apache		 -----> creates certificate