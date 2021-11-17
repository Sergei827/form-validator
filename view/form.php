<!DOCTYPE html>

<html>
    <head>
        <meta charset='utf-8'>
		
		<link rel='stylesheet' href='css/style.css'>
    </head>
    <body>
        <div class='form-wrapper'>
            <p>Всі поля форми є обовязковими до заповнення</p>
            <form action='index.php' method="post" enctype="multipart/form-data" id='employee-data-form'>
                <div>
                    <label>
                        Імя:
                        <input type='text' name='user_name' value=''>
                    </label>
				    <p class='not-validate-message'>
					    <?php if(array_key_exists('user_name', $notValidForItemsMessages)){ echo $notValidForItemsMessages['user_name']; } ?>
					</p>
                </div>
				
                <div>
                    <label>
                        Прізвище:    
                        <input type='text' name='user_surname' value=''>
                    </label>
				    <p class='not-validate-message'>
					    <?php if(array_key_exists('user_surname', $notValidForItemsMessages)){ echo $notValidForItemsMessages['user_surname']; } ?>
					</p>
                </div>
				
                <div>
                    <label>
                        По батькові:     
                        <input type='text' name='user_patronymic' value=''>
                    </label>
					<p class='not-validate-message'>
					    <?php if(array_key_exists('user_patronymic', $notValidForItemsMessages)){ echo $notValidForItemsMessages['user_patronymic']; } ?>
					</p>
                </div> 
				
                <div> 
                    <label>
                        Фото:
                        <p>(максимальний обєм файлу для завантаження <?php echo UPLOAD_MAX_SIZE; ?>)</p>       
                        <input type='file' name='foto' >
                    </label>
					<p class='not-validate-message'>
					    <?php if(array_key_exists('foto', $notValidForItemsMessages)){ echo $notValidForItemsMessages['foto']; } ?>
					</p>
                </div>
				
                <div>
                    <label>
                        Вік:      
                        <input type='number' name='age' value='14' min='14'>
                    </label>
					<p class='not-validate-message'>
					    <?php if(array_key_exists('age', $notValidForItemsMessages)){ echo $notValidForItemsMessages['age']; } ?>
					</p>
                </div>
				
                <div>
                  <fieldset>
                      <lagend>Стаж роботи</legend>  
                      <p>(зверніть увагу що в Укрїні офіційно працювати можна з 14 років)</p>

                      <div>
                          <label>
                              Років:    
                              <input type='number' name='work_experience_years' value='0' min='0'>
                          </label>
                          <label>
                              Місяців:
                              <input type='number' name='work_experience_month' value='0' min='0'>
                          </label>  
					      <p class='not-validate-message'>
					          <?php if(array_key_exists('work_experience', $notValidForItemsMessages)){ echo $notValidForItemsMessages['work_experience']; } ?>
					      </p>
                      </div>  
                  </fieldset>
                </div>
				
                <div>
                    <p>Напишіть коротку розповідь про себе:</p>
                    <textarea name='about_story' value='' class='about-story'></textarea>
					<p class='not-validate-message'>
				        <?php if(array_key_exists('about_story', $notValidForItemsMessages)){ echo $notValidForItemsMessages['about_story']; } ?>
				    </p>		
                </div>

				<input type='hidden' name='submit_form' value='go'>
                <button type='submit'>Відправити</button>
            </form>
        </div>
    </body>    
</html>
