#! /bin/bash

#install apache
sudo apt update
#sudo apt upgrade -y
sudo apt install apache2 -y

#firewall
sudo ufw enable
sudo ufw allow 'Apache Full'
sudo ufw allow 'ssh'


#directory configuration
sudo mkdir /var/www/mect
sudo chown -R $USER:$USER /var/www/mect
sudo chmod -R 755 /var/www/mect

#git
git clone https://github.com/christiannegargoles/CIT480-481.git
cp -a CIT480-481/. /var/www/mect


#make .conf file (vhost)
sudo mv /var/www/mect/mect.conf /etc/apache2/sites-available
sudo a2ensite mect.conf
sudo a2dissite 000-default.conf

#php/mysql
sudo apt install php libapache2-mod-php -y
sudo apt install php-mysql -y
sudo apt install mysql-client-core-8.0
sudo systemctl restart apache2

#move file locations
sudo mkdir extra
sudo mv /var/www/mect/AWS-Key-pair.pem /home/ubuntu/extra
sudo mv /var/www/mect/ubuntu.sh /home/ubuntu/extra
sudo mv /var/www/mect/sample-couldformation-template.json /home/ubuntu/extra
sudo mv /var/www/mect/README.md /home/ubuntu/extra
sudo mv /var/www/mect/mysql.sh /home/ubuntu
sudo chmod +x mysql.sh

#install snap + certbot
sudo apt update
sudo apt install snapd
sudo snap install core
sudo snap refresh core
sudo snap install --classic certbot
sudo ln -s /snap/bin/certbot /usr/bin/certbot
#sudo certbot --apache		 -----> creates certificate