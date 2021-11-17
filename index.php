<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On'); 


// підєднуємо массив з назвою полів форми
require_once 'config/validator_config.php';

// автозавантаження классів
spl_autoload_register(function($class){
    $path = $class;
    $path = str_replace('\\', '/', $path);

    include_once $path.'.php';
});

// массив повідомлень для полі не пройшовших перевірку
$notValidForItemsMessages = [];

if(!empty($_POST['submit_form']))
{
    // створення об'єкту валідатора (коструктор приймає массив з назвою полі форм)
    $formValidator = new \Validators\FormValidator($employeeForm);
    $validateResult = $formValidator->validateForm();

	// индикатор проходження валідації
	$formValidFlag = true;
    // массив з елементам "назва поля форми" => "значення поля форми"
	$formItemValues = [];	
	
    for($i = 0; $i < count($validateResult); $i++)
    {
		$formItemValues[$validateResult[$i]['item_name']] = $validateResult[$i]['value'];

	    if(!$validateResult[$i]['status'])
	    {
			$formValidFlag = false;
		    $notValidForItemsMessages[$validateResult[$i]['item_name']] = $validateResult[$i]['message'];
	    }	
    }
	
	
	/**
	 * якщо форма не проходить валідацію, а фото вже завантажилось
	 * то воно видаляється  
	 */
	if((!$formValidFlag) && (isset($formItemValues['foto'])))
	{
		echo "<br>FOTO ISSET<br>";
		if(file_exists($formItemValues['foto']))
		{
			unlink($formItemValues['foto']);
		}	
	}	

}


if(isset($formValidFlag) && ($formValidFlag === true))
{

	include_once 'view/table.php';

}
else{

	include_once 'view/form.php';

}

