<?php
require_once('template/header.php');
require_once('core/config.php');
require_once('core/functions.php');
$conn = connect();
$data = select($conn);

close ($conn);

?>

<div class="main-ul">
	<ul>
		<a href="./output.php" class="main-link"><li>Output page</li></a>
	</ul>
</div>

<!--Форма User-Role-->

<div class="chieps-field"></div>
	<div class="wrapper">
		<div class="container">
            <h1>User Role</h1>
            
			<form >
				<label for="rolename">Rolename: </label>
				<textarea class="form__textarea" id="rolename" rows="10" name="rolename" cols="60"></textarea>
				<button class="btn" type="submit">add</button>
            </form>
            
		</div>		
	</div>
    
<!--Форма User-->   
    
	<div class="wrapper-second">
		<div class="container">
			<h1>User</h1>
			<form class="myForm">
				<label for="username">Username: </label>
				<input class="form__input__first" type="text" id="username" rows="10" name="username" >
				
				<label for="select">User_role</label>
				<div class="form-select">
					<select id="select" class="sel" name="rolename">
						<option class="active">rolename</option>
						<?php
							
							$out = '';
							
							for ($i=0; $i < count($data); $i++){                        
								$out .="<option name='role_int' value='".$data[$i]['id']."'>{$data[$i]['rolename']}</option>";               
							}
							echo $out;
					
						?>
					</select>
				</div>
				
				<button class="btn__second" type="submit">add</button>
			</form>
		</div>		
    </div>
<?php
require_once('template/footer.php');
?>