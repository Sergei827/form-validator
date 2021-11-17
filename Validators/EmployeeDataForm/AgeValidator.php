<?php

namespace Validators\EmployeeDataForm;

use Validators\EmployeeDataForm\Base\EmployeeValidatorBase;


class AgeValidator extends EmployeeValidatorBase
{
    protected $itemVal = '';


    /**
     * встановлення данних поля з віком
     * встановлюється імя поля, його значення
     * і індикатор прийому форми (в значення "успішно" (true))
     * 
     */

    public function setFormItemName($name)
    {
        if(!empty($_POST[$name]))
        {
            $this->validValue['item_name'] = $name;
            $this->validValue['value'] = (int)htmlspecialchars(trim($_POST[$name]));
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
            /* 
                гілка перевірки поля 
                (заснована на положеннях про те що в Україні не дозволяється працювати особам не досягшим 14 років)
            */
            if($this->validValue['value'] < 14)
            {
                $this->validValue['message'] = "Згідно законодавства України особи не досягші 14 річного віку не можуть працювати!";
            }

            if($this->validValue['value'] > 100)
            {
                $this->validValue['message'] = "В такому віці працювати буде складно! Відпочивайте. Ви цоьго заслуговуєте!";
            }

            if(($this->validValue['value'] > 14) && ($this->validValue['value'] < 100))
            {
                $this->validValue['status'] = true;

                $this->validValue['message'] = "Status OK";
            }

            return $this->validValue;
        }
        else{
            // гілка провалу (невдачі) перевірки
            $this->validValue['message'] = "Некоректні данні! Спробуйте заповнити поле ще раз!";

            return $this->validValue;
        }
   }
}  
