## How to run it
Install dependency  
``` bash
composer install
```
Start script
``` bash
php run.php
```

## Task

Task One - User API:

API endpoint: https://jsonplaceholder.typicode.com/users

Task: Create script which pulls the user data from the API and displays data.
Setup:

- §  create cURL connection to pull data
- §  create a collection class object to hold all the users
- §  create a class object to hold each user
- §  convert all phone numbers to digits only, moving any extensions to a separate property
- §  validate each email address (set new property, email_valid, to true or false based on valid or not) and make

Finally:
- §  loop through users and print filtered data in csv format based on the following headings:
first name, last name, company name, email, phone, extension, city


https://jsonplaceholder.typicode.com/users

https://jsonplaceholder.typicode.com

