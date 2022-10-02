<?php

namespace App;

use App\Libs\Tools;

class User
{

    /**
     * Single user object
     * @var object
     */
    private object $data;


    /**
     * @param array $user
     */
    public function __construct(array $user)
    {
        $this->addUser($user);
    }


    /**
     * Get property value
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->getUser()->{$name};
    }

    /**
     * Get user object
     * @return object
     */
    public function getUser(): object
    {
        return $this->data;
    }


    /**
     * Filter email end phone
     * @param $user
     * @return array
     */
    private function filterData($user): array
    {
        $tools = new Tools();

        $user['email_valid'] = $tools->isValidEmail($user['email']);

        return array_merge($user, $tools->filterPhoneNumber($user['phone']));
    }


    /**
     * Store user object
     * @param array $user
     * @return void
     */
    public function addUser(array $user): void
    {
        $tools = new Tools();

        $user = $this->filterData($user);

        $this->data = $tools->arrayToObject($user);
    }


    /**
     * Get first name from name
     * @return mixed
     */
    public function getFirstName(): string
    {

        return $this->firstAndLastName()->first_name;
    }


    /**
     *  Get last name from name
     * @return mixed
     */
    public function getLastName(): string
    {

        return $this->firstAndLastName()->last_name;
    }

    /**
     *  Get first and last name
     * @return object
     */
    public function firstAndLastName(): object
    {
        $parts = explode(" ", $this->getUser()->name);
        $lastName = array_pop($parts);
        $firstName = implode(" ", $parts);

        return (object)[
            'first_name' => $firstName,
            'last_name' => $lastName,
        ];
    }

}
