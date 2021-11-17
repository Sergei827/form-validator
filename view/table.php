

<html>
    <head>
        <meta charset='utf-8'>
		
		<link rel='stylesheet' href='css/style.css'>
    </head>
    <body>
	    <table>
             <tr>
		    <td>
			<table>			 
			    <tr><td>Фото</td></tr>
				<tr><td> <img src='<?php echo $formItemValues['foto']; ?>' alt='' style='width: 100px'> </td></tr>
            </table>
           </td>
         
            <td>
		    <table>		
			<tr>
		        <td>Імя</td>
				<td colspan="2"> <?php echo $formItemValues['user_name']; ?> </td>	
		    </tr>

			<tr>
		        <td>Призвіще</td>
				<td colspan="2"> <?php echo $formItemValues['user_surname']; ?> </td>	
		    </tr>

			<tr>
		        <td>По батькові</td>
				<td colspan="2"> <?php echo $formItemValues['user_patronymic']; ?> </td>
		    </tr>

			<tr>
		        <td>Вік</td>
				<td colspan="2"> <?php echo $formItemValues['age']; ?> </td>
		    </tr>

			<tr>
		        <td>Стаж</td>
				<td> <?php echo $formItemValues['work_experience']['years'].' років'; ?> </td>
				<td> <?php echo $formItemValues['work_experience']['month'].' місяців'; ?> </td>
		    </tr>
            </table>
            </td>


			<td>
			<table>	
			    <tr><td>Коротка розповідь</td></tr>
                <tr><td> <?php echo $formItemValues['about_story']; ?> </td></tr>				
            </table>
            </td>
           </tr>  			
		</table>
	</body>
</html>	
