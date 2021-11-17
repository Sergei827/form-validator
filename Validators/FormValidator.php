<?php

namespace Validators;


/**
 * класс який створює по черзі
 * класси-валідатори для кожного 
 * пункту (поля) форми і
 * на основі їх роюоти повертає 
 * підсумковий массив
 */
class FormValidator
{
   protected $configArray = [];
   protected $resultArray = [];

   /**
    * в конструктор передається массив 
    * з полів форми і відповідними їм 
    * іменами классів валідаторів
    */
   public function __construct($configArray)
   {
       if(count($configArray) > 0)
       {
          $this->configArray = $configArray;
       }       
   }

   /**
    * метод створює по черзі класс-валідатор
    * для кожного поля і на основі їх роботи
    * повертає підсумковий массив
    */
   public function validateForm()
   {
       for($i = 0; $i < count($this->configArray); $i++)
       {
            $validator = new $this->configArray[$i]['validator']();
            $validator->setFormItemName($this->configArray[$i]['name']);
            $this->resultArray[] = $validator->validate();
       }

       return $this->resultArray;
   }
}
