<?php

namespace Validators\EmployeeDataForm;

use Validators\EmployeeDataForm\Base\EmployeeValidatorBase;


class WorkExperienceValidator extends EmployeeValidatorBase
{
	protected $age;
    protected $years;
	protected $month;

	/**
     * встановлення данних поля з стажем роботи
     * (стаж роботи не може бути більшим ніж "вік прцівника" мінус 14 років)
     * 
     */

    public function setFormItemName($name)
    {
		$name_1 = $name.'_years';
		$name_2 = $name.'_month';

		$this->validValue['item_name'] = $name;
		
		if(!empty($_POST[$name_1]))
		{
			$this->years = (int)htmlspecialchars(trim($_POST[$name_1]));
		}
		else{
			$this->years = 0;
		}
		
		if(!empty($_POST[$name_2]))
		{
			$this->month = (int)htmlspecialchars(trim($_POST[$name_2]));
		}
		else{
			$this->month = 0;
		}
		
		if(!empty($_POST['age']))
		{
			$this->age = (int)$_POST['age'];
		}
		else{
			$this->age = 0;
		}
		
		if(($this->years > 0) || ($this->month > 0))
		{
			if(($this->age >= 14) && ($this->age <= 100))
			{
				$this->setFieldValueFlag = true;
				
			}
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

			$maxPossiblExperience = ($this->age - 14);
			
			if($this->years > $maxPossiblExperience)
			{
				$this->validValue['message'] = "Ваш стаж перевищує максимально можливий! ";
				$this->validValue['message'] .= "<br>Перевірте правильність введенних вами данних!";

				return $this->validValue;
			}

			if(($this->month > 11) || ($this->month < 0))
			{
				$this->validValue['message'] = "Не коректна кількість місяців ! ";
				$this->validValue['message'] .= "<br>Перевірте правильність введенних вами данних!";

				return $this->validValue;
			}
			
			$this->validValue['status'] = true;
			$this->validValue['value'] = [
				    'years' => $this->years,
				    'month' => $this->month
			];

			$this->validValue['message'] = 'Status ОК';

			return $this->validValue;
		
		}	
        else{
			// гілка провалу (невдачі) перевірки
			$message = "В Україні не дозволяється працювати особам не досягшим 14 років!";
            $this->validValue['message'] = $message;

			return $this->validValue;
		}
    }
}
