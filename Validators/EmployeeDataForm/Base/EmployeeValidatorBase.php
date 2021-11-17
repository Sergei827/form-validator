<?php

/**
 * базовий класс всіх обєктів-валідаторів 
 * для html-форми регаліїв робітників
 */

namespace Validators\EmployeeDataForm\Base;

use Validators\ValidatorInterface;


class EmployeeValidatorBase implements ValidatorInterface
{
	/* 
	    массив з статусом перевірки поля,
		його імям, значенням і повідомленням 
	*/

    protected $validValue = [
        'status' => false,
		'item_name' => '',
        'value' => '',
        'message' => ''
    ];

	// індикатор прийому поля форми
	protected $setFieldValueFlag = false;

	// прийом поля форми по її імені
	public function setFormItemName($name){}
	// метод-валідатор
    public function validate(){}
}
