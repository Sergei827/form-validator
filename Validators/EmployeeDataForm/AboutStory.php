<?php

namespace Validators\EmployeeDataForm;

use Validators\EmployeeDataForm\Base\EmployeeValidatorBase;


class AboutStory extends EmployeeValidatorBase
{
    
     /**
     * встановлення данних поля з розповідью про себе
     * встановлюється імя поля, його значення
     * і індикатор прийому форми (в значення "успішно" (true))
     * 
     */

    public function setFormItemName($name)
    {
		$this->validValue['item_name'] = $name;
		
        if(!empty($_POST[$name]))
        {
            $this->validValue['value'] = htmlspecialchars(trim($_POST[$name]));
            $this->setFieldValueFlag = true; 
        }
    }


    /**
     * метод перевірки поля
     * 
     */

    public function validate()
    {
        if($this->setFieldValueFlag )
        {
            // гілка перевірки поля
            $this->validValue['status'] = true;
            $this->validValue['message'] = 'Status OK';
        }
        else{
            // гілка провалу (невдачі) перевірки
            $this->validValue['message'] = 'Будь-ласка напишіть коротку розповідь про себе!';
        }

        return $this->validValue;
    }
}
   