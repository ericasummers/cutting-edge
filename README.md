# _Cutting Edge Hair Salon_

#### _This web page allows a hair salon owner to manage a list of stylists and their clients, 24 February 2017_

#### By _**Erica Wright**_

## Description

_This web page allows a user to input a new stylist, view a list of current stylists, and edit or delete stylists as needed. It also allows a user to input clients for each stylist, and edit or delete those entries._

## Setup/Installation Requirements

* Ensure [composer](https://getcomposer.org/) is installed on your computer.

* In terminal run the following commands:

1. _Fork and clone this repository from_ [gitHub]https://github.com/ericaw21/cutting-edge.git.
2. Navigate to the root directory of the project in which ever CLI shell you are using and run the command: `composer install`.
3. To run tests enter `composer test` in terminal.
4. Create a local server in the /web directory within the project folder using the command: php -S localhost:8000 (assuming you are using a mac), or php -S localhost:8888 (if using windows).
5. Open the directory http://localhost:8000/ (if on a mac) or http://localhost:8888/ (if on windows pc) in any standard web browser.
6. Start server with MAMP and make sure your mySQL server is set to 3306.
7. Open phpMyAdmin and import the database zip files named hair_salon.sql.zip and hair_salon_test.sql.zip located in the project folder to import the databases needed.

## Specifications

|    *Behavior*   |    *Input*    |     *Output*    |
|-----------------|---------------|-----------------|
|A user clicks on a stylist|Click "Bobby Brows"|"Bobby Brows" page appears with his specialty and a list of his clients|
|A user clicks on a client|Click "Jenny Crazy-Hair"|"Jenny Crazy-Hair" page appears with her information and the stylist she sees|
|A user enters a new stylist|Enter "Pamela Perm, perms and curls"|Stylists page updates with "Pamela Perm" listed, database saves new entry in table|
|A user enters a new client|Enter "Max Messy, 503-121-2121"|Stylist page updates with "Max Messy" listed, database saves new entry in table|
|A user clicks "Delete" on button for stylist or client|Click "Delete" on stylists or clients button|Page reloads with selected entry removed, entry removed from database|
|A user clicks "Update" on button for stylist or client| Click "Update" next to stylist name "Bobby Brows", update to "Betsy Brows"| Stylist page reloads with updated "Betsy Brows" name listed|
|A user clicks "Delete All" button on stylists or clients page| Click "Delete All" button|All clients list or all stylists list cleared and removed from database|

## MySQL Commands Used

| *Command Text* | *Action* |
|----------------|----------|
| "SHOW DATABASES;"| Displays list of databases|
| "CREATE DATABASE hair_salon;"|Creates hair salon database|
| "CREATE DATABASE hair_salon_test;"|Creates hair salon test database|
|"USE hair_salon;" and "USE hair_salon_test"|Attaches action to that database|
|"CREATE TABLE stylists (id serial PRIMARY KEY, name VARCHAR (255), specialty VARCHAR (255));"|Creates table within selected database with specified column types|
|"CREATE TABLE clients (id serial PRIMARY KEY, name VARCHAR (255), phone_number INT, stylist_id INT);"|Creates table within selected database with specified column types|
|"SHOW TABLES;"|Displays tables contained within selected database|
|"SELECT * FROM stylists;"|Queries and displays all entries contained within a table|
|"SELECT * FROM clients ORDER BY name;"|Queries and displays all entries contained within a table and orders alphabetically by column selected|
|"INSERT INTO clients (name, phone_number, stylist_id) VALUES ("Jenny Crazy-Hair", 503-556-7890, 2);"|Enters new values into table with information in parentheses|
|"DELETE FROM stylists;"|Removes all entries within clients table in database|
|"DELETE FROM clients WHERE id = 2;"|Removes all entries within clients table in database with the id of 2|
|"UPDATE clients SET name = 'Betsy Brows', phone_number = 971-234-6789 WHERE id = 1;"|Updates values for database entry with id 1 with the new values given|

## Known Bugs

_None so far._

## Support and contact details

_Please contact ericaw21@gmail.com with concerns or comments._

## Technologies Used

* _Composer_
* _CSS_
* _HTML_
* _MySQL_
* _PHP_
* _PHPUnit_
* _Silex_
* _Twig_

### License

*MIT license*

Copyright (c) 2017 **Erica Wright** All Rights Reserved.
