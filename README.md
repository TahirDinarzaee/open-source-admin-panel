# open-source-admin-panel
This is an open source admin panel developed in PHP.

Installation Steps:

Step 1 
Upload Osap folder to hosting 

Step 2 
Create Credentials, create the following in your phpMyAdmin
Database Name
Databse User
User Password

Step 3
Add Database Credentials to Config file & Add BASE URL
locate the config file in this path
osap/config/index.php

To add your BASE URL on the same config/index.php file on line 75 add your BASE URL
I.E $base_url = 'https://www.yoursitename.com/osap';

Step 4
Create Default tables
Now locate the install.php file in this path
osap/install.php and follow the steps

once this step is completed the install.php will be deleted permenantly and is a non reversable action.

Congrats 
OSAP is ready to use yo can now use the Admin Panel to maintain you database and custom develop the application to suit your projects.




