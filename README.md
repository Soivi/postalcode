# postalcode

Postalcode manager is made with PHP. It’s webproject where you can add, list and delete information about finnish postalcode areas. Program uses database, sessions and cookies.

**Here you can try it: https://postalcode.soivi.net**
<br>Username: pcm
<br>Password: postalcode

**More information you can find here: https://soivi.net/2014/postalcode-manager**

## Deploy

**Install LAMP: https://soivi.net/2014/how-to-install-lamp**

Clone repository:

	$ git clone https://github.com/Soivi/postalcode.git

#### Config file
Create config.php

	$ nano config.php

Inside config.php add these lines.

	<?php
        	define (DSN, "mysql:host=localhost;dbname=dbname");
        	define (DB_USER, "user");
        	define (DB_PASSWORD, "password");
	?>

#### Create database

Create database

	CREATE DATABASE postalcodesoivi;
	GRANT ALL ON postalcodesoivi.* TO user@localhost IDENTIFIED BY 'password';

Add postalcode table and test data

	$ mysql -u user -ppassword postalcodesoivi < create.sql
	$ mysql -u user -ppassword postalcodesoivi < insert.sql
