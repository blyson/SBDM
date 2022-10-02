<?php

namespace App\Services;

use App\Libs\Curl;
use App\User;
use App\UsersCollection;

class UserService
{

    /**
     * API base URL
     * @var string
     */
    protected string $baseUrl = "https://jsonplaceholder.typicode.com";

    /**
     * Users grabber
     * @return mixed
     */
    public function fetchUsers(): mixed
    {

        $url = $this->baseUrl . "/users";

        $usersData = Curl::fetch($url);

        return json_decode($usersData, true);
    }

    /**
     * Users collection generator
     * @return void
     */
    public function generateCollection(): void
    {

        $users = $this->fetchUsers();

        $usersCollection = new UsersCollection();

        foreach ($users as $user) {

            $usersCollection->add(new User($user));

        }

    }


    /**
     * Print CSV with filtered user data
     * @return void
     */
    public function printCsv(): void
    {

        $usersCollection = new UsersCollection();

        $out = fopen('php://output', 'w');
        // or save output to the CSV file
        // $out = fopen('out_users.csv', 'w');

        fputcsv($out, $this->addCsvHeaders());

        foreach ($usersCollection->all() as $user) {

            fputcsv($out, [
                $user->getFirstName(),
                $user->getLastName(),
                $user->company->name,
                $user->email,
                $user->phone,
                $user->phone_extension,
                $user->address->city,
            ]);

        }

        fclose($out);
    }


    /**
     * CSV header
     * @return string[]
     */
    private function addCsvHeaders(): array
    {
        return [
            "first name", "last name", "company name", "email", "phone", "phone extension", "city"
        ];
    }


}
