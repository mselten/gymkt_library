# Web knihovny Gymnázia Jaroslava Vrchlického

## TODO:
```
- KUBA
        - check mobile version
        - improve footer
        - polygons at background svg 
        - play with logo
        - search bar "eating results 

- MAREK
        - format sorted results       
        - delete duplicates in results

- GENERAL
        - howering search bar same size as results
        - multi page results   
        - highlight found match
        - wierd result from request.php page repete result without going to main page - BUG maybe 
        - highlight "zadejte nazev knihy" 
        - footer
    	- check security (.htaccess, etc...)
        - create separate basic layout  
        - add config.php to .gitignore and delete on github leave only local coppy with local setting
        - finish alpha version
        - make search bar stay at place while moving with page
        - web page icon (done but change colors according to css)
        - add the robot.txt and other similar files
        - search suggestions
        - improve for smartphone use (lanscape mode work, but not portrait mode)
        - make url nicer user wont know which folder is he in
        - index the database????
        - add SAVEPOINT to database
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

