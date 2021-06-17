Laravel Project Deployment Documentation

Server Requirements :

    • LAMP OR LEMP Stack
    • PHP: 7.1.3 or greater
    • PDO PHP extension
    • JSON PHP extension
    • OpenSSL PHP extension
    • Tokenizer PHP extension
    • XML PHP extension
    • Mbstring PHP extension
    • Ctype PHP extension
    • BCMath PHP extension

Step 1 . Clone the git repo inside server (eg. /var/www/html/)

Step 2 . Install composer dependencies , cd to the root dir of the project and execute composer install in terminal

Step 3 . Install npm dependencies , cd to the root dir of the project and execute npm install in terminal

Step 4 . Create a copy of .env file from .env.example file from the root project dir , and replace the database and mailing configurations
Change below details in env file

    • DB_DATABASE=YOUR_DB_NAME
    • DB_USERNAME=YOUR_DB_USERNAME
    • DB_PASSWORD=YOUR_DB_PASSWORD

Step 5 . Generate an app encryption key, necessary for encoding various elements of cookies, password hashes and more, execute php artisan key:generate

Step 6 . Create a database, and make sure the Step 4. is done properly, run the below command
command: php artisan migrate

Step 7 . Passport security keys generation , execute the command from the root dir of the project php artisan passport:install(Not required for this particular project you can skip this step)

Step 8 . From .env change the APP_NAME to the desired name, also change the APP_ENV to prod if on production enviornment else on local, if local or uat environment, also change APP_DEBUG to false if on production enviornment.

Step 9 . Give read and write permission to storage and bootstrap/cache directory.
Command: sudo chgrp -R www-data /var/www/example-project-name/storage /var/www/example-project-name/bootstrap/cache

Command: sudo chmod -R ug+rwx /var/www/example-project-name/storage /var/www/example-project-name/bootstrap/cache

Step 10 . Run command: php artisan serve
this will run the project on default server. If you want to create a vhost then simply follow below steps

Step 11 . Start by copying the file for the first domain:

sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/example.com.conf

Step 12 . Open the new file in your editor (we’re using nano below) with root privileges:

sudo nano /etc/apache2/sites-available/example.com.conf
copy below code:

    <VirtualHost *:80>
        ServerName url.hash
        DocumentRoot /var/www/html/YOUR_PROJECT_NAME/public
    <Directory /var/www/html/YOUR_PROJECT_NAME/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>

Step 13 . Enable the New Virtual Host Files

    a) With our virtual host files created, we must enable them. We’ll be using the a2ensite tool to achieve this goal.
    command: sudo a2ensite example.com.conf

    b) Next, disable the default site defined in 000-default.conf:
    command: sudo a2dissite 000-default.conf

    c) When you are finished, you need to restart Apache to make these changes take effect and use systemctl status to verify the success of the restart.
    command:sudo systemctl restart apache2

Step 14 . Set Up Local Hosts File (Optional)

    a) If you haven’t been using actual domain names that you own to test this procedure and have been using some example domains instead, you can test your work by temporarily modifying the hosts file on your local computer.

    b) On a local Mac or Linux machine, type the following:
    command: sudo nano /etc/hosts

    c) For a local Windows machine, find instructions on altering your hosts file here.
    Using the domains used in this guide, and replacing your server IP for the your_server_IP text, your file should look like this:

    /etc/hosts
    127.0.0.1   localhost
    127.0.1.1   guest-desktop
    your_server_IP url.hash

Save and close the file. This will direct any requests for url.hash on our computer and send them to our server.

Step 15 . Run the application with YOUR_URL/ and you will be redirected to /login where you can register new user.
For frontend customer(user) run YOUR_APP/customer url which will redirect you to a form
