# Web knihovny Gymnázia Jaroslava Vrchlického

## TODO:
```
- KUBA
	- check logo, font, color?
	- improve layout

- MAREK
	- create communication with database and the actual database
	- validate user input - book search

- GENERAL
	- finish alpha version
	- change font??
	- add meta files
	- add the robot.txt and other similar files
	- web page icon
	- make url nicer user wont know which folder is he in
	- check security (.htaccess, etc...)
```

## Architecture
```
- gymkt_library
	- database
	- Design	// kuba working folder
	- web		// all the source code that will be on the web server
        	- controller    // php classes
        	- css
        	- view          // folder with all html templates
		- index.php	// home page of knihovna
		- request.php	// request handler
```

## How to set up server
1. Install apache/httpd - komunikace s TCP socketem a spuštění php init scriptu
	- `# dnf install httpd`
	- `# systemctl enable httpd.service`
	- `# sestemctl start httpd.service`
	- disable firewall for this server (only if you wanna access it remotely)
	- try to connect to localhost:80
2. Install MariaDB (Mysql alternative) - program pro práci s databází
	- `# dnf install mariadb-server`
	- `# systemctl enable mariadb`
	- `# systemctl start mariadb`
	- `# mysql_secure_installation`
3. Install PHP
	- `# dnf install php php-common`
	- `# dnf install php-mysqlnd php-pdo php-gd php-mbstring`

	- `# systemctl restart httpd`
	- test php
		- create php test script "info.php" in /var/www/html
		- try to connect to localhost/info.php
