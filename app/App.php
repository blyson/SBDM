<?php

namespace App;

use App\Services\UserService;

class App
{

    /**
     * Run app method
     * @return void
     */
    public function run(): void
    {

        $userService = new UserService();

        // create cURL connection to pull data
        // create a collection class object to hold all the users
        // create a class object to hold each user
        // convert all phone numbers to digits only, moving any extensions to a separate property
        // validate each email address (set new property, email_valid, to true or false based on valid or not) and make
        $userService->generateCollection();

        // loop through users and print filtered data in csv format based on the following headings:
        // first name, last name, company name, email, phone, extension, city
        $userService->printCsv();

    }

}
