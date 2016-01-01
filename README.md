# postalcode

Postalcode manager is made with PHP. It’s webproject where you can add, list and delete information about finnish postalcode areas. Program uses sessions and cookies. I have used bootstrap in styles.

**Here you can try it: https://postalcode.soivi.net**
<br>Username: pcm
<br>Password: postalcode

**More information you can find here: https://soivi.net/2014/postalcode-manager**

## Deploy

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

Coming soon...
