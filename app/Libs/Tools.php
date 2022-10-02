<?php

namespace App\Libs;

class Tools
{

    /**
     * Validate email
     * @param string $email
     * @return bool
     */
    public function isValidEmail(string $email): bool
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }


    /**
     * Filter user phone number and separate phone extension
     * @param $phone
     * @return array
     */
    public function filterPhoneNumber($phone): array
    {

        $phoneExploded = explode(' x', $phone);

        return [
            'phone' => $this->filterDigitsOnly($phoneExploded[0] ?? ''),
            'phone_extension' => $phoneExploded[1] ?? '',
        ];
    }


    /**
     * Filter chars - digits only
     * @param string $text
     * @return array|string|null
     */
    public function filterDigitsOnly(string $text): array|string|null
    {

        return preg_replace('/\D+/', '', $text);
    }

    /**
     * Convert array to object
     * @param array $data
     * @return object
     */
    public function arrayToObject(array $data): object
    {
        return json_decode(json_encode($data));
    }

}
