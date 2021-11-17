<?php

/*
    массив з елементами 'name' і 'validator':

    - 'name' містить назву форми
    - 'validator' містить назву классу обєкту-валідатора для поля
*/


$employeeForm = [
    ['name' => 'user_name', 'validator' => '\Validators\EmployeeDataForm\UserNameValidator'],
    ['name' => 'user_surname', 'validator' => '\Validators\EmployeeDataForm\UserNameValidator'],
    ['name' => 'user_patronymic', 'validator' => '\Validators\EmployeeDataForm\UserNameValidator'],
    ['name' => 'foto', 'validator' => '\Validators\EmployeeDataForm\FotoValidator'],
    ['name' => 'age', 'validator' => '\Validators\EmployeeDataForm\AgeValidator'],
	['name' => 'work_experience', 'validator' => '\Validators\EmployeeDataForm\WorkExperienceValidator'],
    ['name' => 'about_story', 'validator' => '\Validators\EmployeeDataForm\AboutStory'],
];

// мак4симальний обїем завантажуваного файлу
define('UPLOAD_MAX_SIZE', ini_get('upload_max_filesize'));

