<?php

namespace Diffy;

class User
{
    /**
     * Create User.
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $location Used internally for tracking where user is coming from, utm_* tags.
     * @param string $coupon Optional coupon code applied to the new account. A coupon that can not be applied
     *   does not stop the registration, check `coupon.applied` in the response.
     *
     * @return mixed
     *
     * @throws InvalidArgumentsException
     */
    public static function create(string $name, string $email, string $password, string $location = '', string $coupon = '')
    {
        if (empty($name)) {
            throw new InvalidArgumentsException('Name can not be empty');
        }

        if (empty($email)) {
            throw new InvalidArgumentsException('Email can not be empty');
        }

        if (empty($password)) {
            throw new InvalidArgumentsException('Password can not be empty');
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'location' => $location,
        ];

        if (!empty($coupon)) {
            $data['coupon'] = $coupon;
        }

        return Diffy::request('POST', 'register', $data);
    }

    /**
     * Send the email with a link to (re)set the user's password.
     *
     * @param string $email
     *
     * @return mixed
     *
     * @throws InvalidArgumentsException
     */
    public static function sendResetPasswordEmail(string $email)
    {
        if (empty($email)) {
            throw new InvalidArgumentsException('Email can not be empty');
        }

        return Diffy::request('POST', 'reset-password-email', ['email' => $email]);
    }
}
