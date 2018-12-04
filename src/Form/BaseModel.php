<?php

namespace LRC\Form;

/**
 * Base class for models.
 */
class BaseModel implements ValidationInterface
{
    use ValidationTrait;

    /**
     * @var array   Array of nullable attributes.
     */
    protected $nullables;


    /**
     * Set nullable attributes.
     *
     * @param array $attrs  Attribute names.
     */
    protected function setNullables($attrs)
    {
        $this->nullables = $attrs;
    }


    /**
     * Return whether an attribute is nullable.
     *
     * @param string $attr  Attribute name.
     *
     * @return bool         True if the attribute is nullable, false otherwise.
     */
    public function isNullable($attr)
    {
        return $this->nullables && in_array($attr, $this->nullables);
    }
}
