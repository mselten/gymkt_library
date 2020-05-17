# gymkt_library - Web knihovny Gymnázia Jaroslava Vrchlického

## TODO:

 - KUBA
  - create html skelet + css

 - MAREK
  - create communication between frontend and backend using POST

 - GENERAL
  - finish alpha version
  - check security (.htaccess, etc...)

## Architecture
 - gymkt_library
  - database
  - Design	// kuba working folder
  - web		// all the source code that will be on the web server
   - index.php // home page of knihovna

## How to set up server
1. Install apache/httpd - komunikace s TCP socketem a spuštění php init scriptu
	- # dnf install httpd
	- # systemctl enable httpd.service
	- # sestemctl start httpd.service
	- disable firewall for this server (only if you wanna access it remotely)
	- try to connect to localhost:80
2. Install MariaDB (Mysql alternative) - program pro práci s databází
	- # dnf install mariadb-server
	- # systemctl enable mariadb
	- # systemctl start mariadb
	- # mysql_secure_installation
3. Install PHP
	- # dnf install php php-common
	- # dnf install php-mysqlnd php-pdo php-gd php-mbstring

	- # systemctl restart httpd
	- test php
		- create php test script "info.php" in /var/www/html
		- try to connect to localhost/info.php
