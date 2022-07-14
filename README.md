# Test 1
Create an HTML form with the following input fields to allow for the capturing of
data into a database:
Name, Surname, Id No, Date of Birth, POST button, CANCEL button
Create a database with a relevant schema to store the input fields in.
## REQUIREMENTS:
* Save 3 records into the database without duplicating the Id No. The ability to
capture a duplicate Id No in the database table is an immediate fail.
* If a duplicate Id No is found up on capturing, the user must be informed about
this and the form repopulated. People do not like to input their information in
twice.
* Validate the Id No field to make sure it is a number and that it is only 13
characters long.
* Validate the Date of birth field to make sure that the input date is in the
format dd/mm/YYYY.
* There must be a valid data in the name and surname fields and no characters
that can cause a record not to be inputted into the database.

## PASS:
* Validation works as per requirements
* Date of birth field is captured correctly and is stored properly in the database
* The Id No field is no more than 13 chars long. (Bonus – check match with Date
of Birth)
* No duplicate ids are in the database and the user is made aware of this.

## Installation

* Needs composer to be installed, for windows
 https://getcomposer.org/Composer-Setup.exe

1) Clone the repo:
```
git clone https://github.com/kwanda9700/form_blog.git Form
```

2) Create `.env` file from the `.env.example` file by running this in the terminal:
```
composer run-script post-root-package-install
```

3) Setup database credentials on the `.env` and create a database on phpMyAdmin

4) Update Composer
``` 
composer update
```

5) Run the post create project script to generate application key
```
composer run-script post-create-project-cmd
```

6) Migrate the tables to the database
```
php artisan migrate
```

7) Serve the project
```
php artisan serve
```

8) then visit http://127.0.0.1:8000/

Done.
