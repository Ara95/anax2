<?php

namespace LRC\Form;

/**
 * Model validation interface.
 */
interface ValidationInterface
{
    /**
     * Set validation rules for model.
     *
     * @param array $rules  Array of rules.
     */
    public function setValidation($rules);


    /**
     * Check whether the model state is valid according to its registered rules.
     *
     * @return bool     True if the model state is valid, false otherwise.
     */
    public function isValid();


    /**
     * Validate model and return validation errors.
     *
     * @return array    Array of validation errors (attribute => error).
     */
    public function getValidationErrors();
}
