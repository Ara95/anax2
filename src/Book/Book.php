<?php

namespace Ara\Book;

use \LRC\Form\BaseModel;

/**
 * Book model class.
 */
class Book extends BaseModel
{
    public $id;
    public $title;
    public $author;
    public $published;


    public function __construct()
    {
        $this->setNullables(['published']);
        $this->setValidation([
            'title' => [
                [
                    'rule' => 'required',
                    'message' => 'Titel måste anges.'
                ],
                [
                    'rule' => 'maxlength',
                    'value' => 200,
                    'message' => 'Titeln får vara maximalt 200 tecken lång.'
                ]
            ],
            'author' => [
                [
                    'rule' => 'required',
                    'message' => 'Författare måste anges.'
                ],
                [
                    'rule' => 'maxlength',
                    'value' => 200,
                    'message' => 'Författaren får vara maximalt 200 tecken lång.'
                ]
            ],
            'published' => [
                [
                    'rule' => 'number',
                    'message' => 'Publiceringsåret måste vara numeriskt.'
                ],
                [
                    'rule' => 'maxvalue',
                    'value' => date('Y'),
                    'message' => 'Publiceringsåret får inte vara senare än innevarande år.'
                ]
            ]
        ]);
    }
}
