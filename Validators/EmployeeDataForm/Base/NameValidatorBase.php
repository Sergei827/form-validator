<?php

/**
 * базовий класс для обєктів-валідаторів 
 * полів з прізвищем, імям і по батькові
 * 
 */

namespace Validators\EmployeeDataForm\Base;


class NameValidatorBase extends EmployeeValidatorBase
{
    // регулярний вираз для валідації імені, прізвища та по батькові
    protected $nameRegExp = '/^[a-zA-Zа-яёієїА-ЯЁІЄЇ\s\-]+$/u';

    public function setFormItemName($name){}
    public function validate(){}
}
