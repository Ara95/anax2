<?php

namespace LRC\Form;

/**
 * Model validation.
 */
trait ValidationTrait
{
    /**
     * @var array   Validation rules that apply to the model.
     */
    private $validationRules;

    /**
     * @var array   Array of errors resulting from validation.
     */
    private $validationErrors;


    /**
     * Set validation rules for model.
     *
     * @param array $rules  Array of rules.
     */
    public function setValidation($rules)
    {
        $this->validationRules = $rules;
    }


    /**
     * Check whether the model state is valid according to its registered rules.
     *
     * @return bool     True if the model state is valid, false otherwise.
     */
    public function isValid()
    {
        $this->validate();
        return empty($this->validationErrors);
    }


    /**
     * Validate model and return validation errors.
     *
     * @return array    Array of validation errors (attribute => error).
     */
    public function getValidationErrors()
    {
        $this->validate();
        return $this->validationErrors;
    }


    /**
     * Validate model according to its registered rules.
     */
    private function validate()
    {
        $this->validationErrors = [];
        foreach ($this->validationRules as $attr => $rules) {
            foreach ($rules as $rule) {
                $passed = true;
                if ($rule['rule'] == 'required') {
                    $passed = $this->hasValue($attr);
                } elseif ($this->hasValue($attr)) {
                    $passed = $this->validateRule($rule, $attr);
                }
                if (!$passed) {
                    $this->validationErrors[$attr] = $rule['message'];
                }
            }
        }
    }


    /**
     * Validate model attribute against a specific rule.
     *
     * @param array     $rule   Validation rule.
     * @param string    $attr   Model attribute to validate.
     *
     * @return bool             True if the attribute validates, false otherwise.
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    private function validateRule($rule, $attr)
    {
        switch ($rule['rule']) {
            case 'number':
                $passed = is_numeric($this->$attr);
                break;
            case 'minlength':
                $passed = (mb_strlen($this->$attr) >= $rule['value']);
                break;
            case 'maxlength':
                $passed = (mb_strlen($this->$attr) <= $rule['value']);
                break;
            case 'minvalue':
                $passed = ($this->$attr >= $rule['value']);
                break;
            case 'maxvalue':
                $passed = ($this->$attr <= $rule['value']);
                break;
            case 'email':
                $passed = (preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}/', $this->$attr) == 1);
                break;
            case 'forbidden-characters':
                $passed = (preg_match('/['.$rule['value'].']/', $this->$attr) == 0);
                break;
            case 'match':
                $passed = ($this->{$rule['value']} === $this->$attr);
                break;
            case 'custom':
                $passed = $rule['value']($attr, $this->$attr);
                break;
            default:
                $passed = false;
        }
        return $passed;
    }


    /**
     * Check whether the specified attribute is set in the model.
     *
     * @param string $attr  Model attribute.
     *
     * @return bool         True if the attribute has a non-empty value, false otherwise.
     */
    private function hasValue($attr)
    {
        return (isset($this->$attr) && $this->$attr !== '');
    }
}
