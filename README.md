# Training project ATM-banking.
Greetings. I present my training task using PHP and OOP.

## Files
Folder **app**
> Project controllers are collected in the **app** park

Folder **css**
> Styles collected in **css** folder

Folder **js**
> Project scripts are collected in **js** folder

Folder **views**
> Files from the folder **views** are engaged in the formation of HTML code. Files from the folder view are engaged in the formation of HTML code. Grouped into pages.

File **dbconfig.php**

> This file was created for easy connection to the database.
Includes an array of values such as **password, login, database name,** and **host**.


Other PHP files, such as **user-page.php, send-money.php, registration.php, pass-change.php, index.php, get-money.php, auth.php** and **add-money.php** store the logic of work pages.

## REQUIREMENTS

The minimum requirement is that your Web server supports
PHP 8.0 or above and MySQL 8.0 or above. Project has been tested with Apache HTTP server
on Windows and Linux operating systems.


## QUICK START

 1. Unpack the archive with the project on the server.
 2. Import the database that lies at the root of the project.
     `atm-database.sql`



 4. Connect project to database in file
`dbconfig.php`
 
Ready!

## WHAT'S NEXT
Please visit the project site using any browser and test it.


# Implemented features

 - Authorization;
 - Registration;
 - Password change;
 - Money transaction;
 - Put money into the account (adjusted for the lack of a bill acceptor);
 - Withdrawal of funds

# Features in future versions

- Routing will be added;
- Multilingualism will be added;
- Currency will be added;
- Name of the recipient will be displayed before the funds are sent;
- Appearance improvements;
- Receipt generation;
- Preservation of the history of work with funds;
- Add saving data when an error is returned from the form


# User flow
![User flow pic](https://drive.google.com/file/d/1mnlOYz1TtJKYysyEU12eSBIOGxECGegK/view?usp=sharing)
