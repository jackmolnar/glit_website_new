<?
	//CHECK TO SEE IF THE USER IS LOGGED IN
		if(isset($_REQUEST['logintry']) && $user_logged==false){
			/**************************************************************************
			DISPLAY LOG ERROR MESSAGE
			*************************************************************************/
			print "<div id='error'>
						<div id='content'>
							The information you entered was incorrect! Please try again!
						</div>
					</div>";
		}
	/**************************************************************************
	DISPLAY MENU OR LOGIN BOX
	**************************************************************************/
		print "<div id='user_box'><div id='content'>";
		if($user_logged==true){
			/**************************************************************************
			DISPLAY WELCOME MESSAGE, AND THE MENU
			*************************************************************************/
				print "<div id='buttons1'>
					<ul>
						<li><strong>Welcome $user->user_name!</strong></li>
						<li>&mdash;</li>
						<li><a href='?pid=-1'>logout</a></li>
					</ul>
				</div>
				<div id='buttons'>
					<ul>";
			//INSTALLED MODULES
				$sql = "SELECT * FROM ".$cfg->db_prefix."_modules ORDER BY id ASC";
				$result = $db->DB_Q_C($sql);
				$count = mysql_affected_rows();
				if($count>0){
					while($row = mysql_fetch_array($result)){
						$mod = new $row['name']($db, $cfg, $time);
						echo $mod->menu($user, $pid);
					}
				}
			print "</ul>";
			print "</div>";
			print "<div id='subbuttons'>";
				$sql = "SELECT * FROM ".$cfg->db_prefix."_modules ORDER BY id ASC";
				$result = $db->DB_Q_C($sql);
				$count = mysql_affected_rows();
				if($count>0){
					while($row = mysql_fetch_array($result)){
						$mod = new $row['name']($db, $cfg, $time);
						echo $mod->submenu($user, $pid, $cid);
					}
				}
			print "</div>";
		}else{
			/**************************************************************************
			DISPLAY LOG IN FORM
			*************************************************************************/
			print "<form method='post' action='?'>";
			print "<table>";
			print "<input type='hidden' name='logintry' value='yes' />";
			print "<tr><th>username</th><td><input type='text' id='user' name='uid'  /></td></tr>";
			print "<tr><th>password</th><td><input type='password' id='pass' name='pwd'  /></td></tr>";
			print "<tr><th>keep me</th><td>
			<select name='cook'>
			<option value='yes'>logged in forever</option>
			<option value='no'>logged in for this session</option>
			</select>
			</td></tr>";
			print "<tr><td colspan='2' align='right'><input class='submit-button' type='submit' value='Log in' /></td></tr>";
			print "</table>";
			print "</form>";
		}
		print "</div></div>";
?>


