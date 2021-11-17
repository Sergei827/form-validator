<?php
/**
 * спільний інтерфейс для усіх обєктів-валідаторів
 * 
 */

namespace Validators;

interface ValidatorInterface
{
    public function setFormItemName(string $name);
    public function validate();
}
