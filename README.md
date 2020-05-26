# Web knihovny Gymnázia Jaroslava Vrchlického

## TODO:
```
- KUBA
        - improve footer
        - modernize css...
        - add polygons to background
        - play with logo

- MAREK
    	- validate user input - book search - sql injection
        - search in database without accent characters (maybe make search table withought accent???????)
        - make search case insensitive, diacritic insensitive



- GENERAL
    	- check security (.htaccess, etc...)
        - check for sql injection
        - finish alpha version
        - make search bar stay at place while moving with page
        - change font??
        - web page icon (done but change colors according to css)
        - add the robot.txt and other similar files
        - search suggestions
        - improve for smartphone use (lanscape mode work, but not portrait mode)
        - make url nicer user wont know which folder is he in
        - index the database????
        - logo square?, remove shadow?
        - add SAVEPOINT to database 
        - spaces between name and surname always if not after dash or dot
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
4. Add another user to the mysql server with reduced privilages


## How search should work
1. call function to parse search request
2. check for sql injection
3. replace special characters for spaces
4. parse the request to words
5. deal with case sensitivity and diacritic sensitivity
6. make search for each word
7. put together the search result for each word and find the most words match on each book
8. make ranking of results (prioritize exact mach)
     
