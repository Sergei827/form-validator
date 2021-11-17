<?php

namespace Validators\EmployeeDataForm;

use Validators\EmployeeDataForm\Base\EmployeeValidatorBase;


class FotoValidator extends EmployeeValidatorBase
{
    // массив допустимих для файлу mimi-типів 
    protected $mimiTypes = [
        'image/jpeg',
        'image/pjpeg',
        'image/bmp',
        'image/png',
        'image/webp'
    ]; 

    
    /**
     * встановлення данних поля з фото
     * встановлюється імя поля завантадження форми 
     * і індикатор який засвідчує існування 
     * такого імені (в значення "успішно" (true))
     * 
     */

    public function setFormItemName($name)
    { 
        if(isset($_FILES[$name]))
        {
            $this->validValue['item_name'] = $name;
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
             $fileArr = $_FILES[$this->validValue['item_name']];

             // перевірка на помилки завантаження
             if($fileArr['error'] === UPLOAD_ERR_NO_FILE)
             {
                $this->validValue['message'] = 'Фото є обовязковим. Повторіть завантаження';
             }

             if($fileArr['error'] === UPLOAD_ERR_INI_SIZE)
             {
                $this->validValue['message'] = 'Файл перевищив допустимий обєм';
             }

             if($fileArr['error'] === UPLOAD_ERR_FORM_SIZE)
             {
                $this->validValue['message'] = 'Файл перевищив допустимий обєм';
             }

             if($fileArr['error'] === UPLOAD_ERR_PARTIAL)
             {
                $this->validValue['message'] = 'Помилка зєднання. Спробуйте ще раз!';
             }


             // перевірка в разі завантаження без помилок
             if($fileArr['error'] === UPLOAD_ERR_OK)
             {
                 $file_type = $fileArr['type'];
                 $typeFlag = $this->typeСhecking($file_type, $this->mimiTypes);

                 // якщо не правильний mimi-тип   
                 if(!$typeFlag)
                 {
                     $validValue['message'] = 'Тип вашого файлу не підтримується!';
                     $validValue['message'] = '<br>Завантажте інший файл';
                 }

                 // якщо правильний mimi-тип 
                 if($typeFlag)
                 { 
                     $file_name = $fileArr['name'];
                     $file_full_name = "foto/{$file_name}";
                  
                     if(!file_exists($file_full_name))
                     {
                         // збереження фото
                         copy($fileArr['tmp_name'], $file_full_name);

                         $this->validValue['status'] = true;
                         $this->validValue['value'] = $file_full_name;
                         $this->validValue['message'] = 'Status OK';
                     }
                     else{
                        $this->validValue['message'] = 'Файл з таким імям вже існує!';
                        $this->validValue['message'] .= '<br>Завантажте файл з іншим імям';
                     }
                }
                
                return $this->validValue;
             }
        }
        else{
            // гілка провалу (невдачі) перевірки
            $this->validValue['message'] = 'Фото є обовязковим. Повторіть завантаження';
            return $this->validValue;
        }    
    }


    /**
     * метод перевірки mimi-типу
     * 
     */

    protected function typeСhecking($type, $typesArr)
    {
        $typeFlag = false;

        for($i=0; $i < count($typesArr); $i++)
        {
            if($typesArr[$i] === $type)
            {
                $typeFlag = true;
            }
        }

        return $typeFlag;
    }
}
