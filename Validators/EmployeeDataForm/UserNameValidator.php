<?php

namespace Validators\EmployeeDataForm;

use Validators\EmployeeDataForm\Base\NameValidatorBase;


class UserNameValidator extends NameValidatorBase
{

    /**
     * встановлення данних поля з прізвищем, імям або по батькові
     * встановлюється імя поля, його значення
     * і індикатор прийому форми (в значення "успішно" (true))
     * 
     */

    public function setFormItemName($name)
    {
		$this->validValue['item_name'] = $name;
		
        if(!empty($_POST[$name]))
        {
            $name = htmlspecialchars(trim($_POST[$name]));
            $name = mb_strtolower($name);
            $firstLetter = mb_strtoupper(mb_substr($name, 0, 1));
            $name = $firstLetter.mb_substr($name, 1);

            $this->validValue['value'] = $name;
            $this->setFieldValueFlag = true;
        }
    }


    /**
     * метод перевірки поля
     * 
     */

    public function validate()
    {
        if($this->setFieldValueFlag)
        {
            // перевірка на вміст пробілу
            $whitespaceCharFlag = mb_strpos($this->validValue['value'], ' ');

            // гілка перевірки поля
            if(preg_match($this->nameRegExp, $this->validValue['value']) &&  !$whitespaceCharFlag)
            {
                $this->validValue['status'] = true;
                $this->validValue['message'] = 'Status OK';

                
                echo "<br>NAME VALID VALUE: <br>";
                echo "<pre>";
                var_dump($this->validValue);
                echo "</pre>";

                return $this->validValue;
            }
            else{
                $this->validValue['message'] = 'Форма містить недопустимі символи!';
         
                return $this->validValue;
            }
        }
        else{
            // гілка провалу (невдачі) перевірки
            $this->validValue['message'] = 'Ви не заповнили форму яка є обовзковою!';
 
            return $this->validValue;
        }
    }
}
