<?php

namespace Ara\User;

use \LRC\Form\BaseModel;

class User extends BaseModel
{
    public $id;
    public $username;
    public $email;
    public $password;
    // public $deleted;



    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->setValidation([
            'username' => [
                [
                    'rule' => 'required',
                    'message' => 'Användarnamn måste anges.'
                ],
                [
                    'rule' => 'forbidden-characters',
                    'value' => '&<>\"\'',
                    'message' => 'Otillåtna tecken använda. Följande tecken är icke tillåtna: & < > \' "'
                ],
                [
                    'rule' => 'maxlength',
                    'value' => 50,
                    'message' => 'Användarnamnet får vara maximalt 50 tecken långt.'
                ],
            ],
            'email' => [
                [
                    'rule' => 'required',
                    'message' => 'Epostadress måste anges.'
                ],
                [
                    'rule' => 'email',
                    'message' => 'Epostadress är angiven i fel format.'
                ],
                [
                    'rule' => 'forbidden-characters',
                    'value' => '&<>\"\'',
                    'message' => 'Otillåtna tecken använda. Följande tecken är icke tillåtna: & < > \' "'
                ],
                [
                    'rule' => 'maxlength',
                    'value' => 50,
                    'message' => 'Epostadressen får vara maximalt 50 tecken lång.'
                ],
            ],
            'password' => [
                [
                    'rule' => 'required',
                    'message' => 'Lösenord måste anges.'
                ],
                // [
                //     'rule' => 'forbidden-characters',
                //     'value' => '&<>\"\'',
                //     'message' => 'Otillåtna tecken använda. Följande tecken är icke tillåtna: & < > \' "'
                // ],
            ],
        ]);
    }



    /**
     * Hash password.
     *
     * @return void
     */
    public function hashPassword()
    {
        if ($this->password) {
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        }
    }



    /**
     * Verify the acronym and the password, if successful the object contains
     * all details from the database row.
     *
     * @param string $inputPassword the password to use.
     *
     * @return boolean true if passwords match, else false.
     */
    public function verifyPassword($inputPassword)
    {
        return password_verify($inputPassword, $this->password);
    }



    /**
     * Check if user is an admin
     * @return bool true if user exists, otherwise false
     */
    public function isAdmin()
    {
        return ($this->username === "admin");
    }
}
