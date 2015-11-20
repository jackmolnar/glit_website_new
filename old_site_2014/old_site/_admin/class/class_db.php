<?
class class_db
{	
	//-----------------------------------------------------------------
	//PROPERTIES
	//-----------------------------------------------------------------
	var $db_host;	//Hostname or IP of your MySQL-Server
	var $db_name;	//Name of your Database
	var $db_user; 	//Usernameto Login to your Database
	var $db_pass;	//Password to Login to your Database
	//-----------------------------------------------------------------
	//NAME:DB_CLASS
	//DATE:2-10-05
	//DECRIP: CONSTRUCTOR, SETS ALL THE DATABASE PROPERTIES AND PREPARES
	//IT FOR AN ATTEMPT TO CONNECT.
	//-----------------------------------------------------------------
	function class_db($host, $name, $user, $pass){
		$this->db_host = $host;
		$this->db_name = $name;
		$this->db_user = $user;
		$this->db_pass = $pass;
	}
	//-----------------------------------------------------------------
	//NAME:DB_CONNECT
	//DATE:2-10-05
	//DECRIP: ESTABLISHES A CONNECTION TO THE DATABASE AND RETURNS
	//THE RESULT
	//-----------------------------------------------------------------
	function DB_CONNECT(){
		$con = @mysql_connect($this->db_host, $this->db_user, $this->db_pass)
        or die('The database appears to be down.');

    	if ($this->db_name!='' and !@mysql_select_db($this->db_name))
        	die('The database is unavailable at the moment.');
    
    	return $con ;
	}
	//-----------------------------------------------------------------
	//NAME:DB_CLOSE
	//DATE:2-10-05
	//DECRIP: CLOSES THE SPECIFIED CONNECTION TO THE DATABASE	
	//-----------------------------------------------------------------
	function DB_CLOSE($con){
		mysql_close ($con);
	}
	//-----------------------------------------------------------------
	//NAME:DB_Q
	//DATE:11-12-06
	//DECRIP: EXECUTES A SQL QUERY AND RETURNS THE RESULT	
	//-----------------------------------------------------------------
	function DB_Q_C($sql, $from=''){
		$result = mysql_query($sql);
		if(!$result){
			print "An error has occured - DB_Q_C - $from<br>".mysql_error();
		}else{
		}
		return $result;
	}
	//-----------------------------------------------------------------
	//NAME:DB_Q
	//DATE:11-12-06
	//DECRIP: EXECUTES A SQL QUERY AND RETURNS THE RESULT	
	//-----------------------------------------------------------------
	function DB_Q_MULT($sql, $from=''){
    $array = explode( ';', $sql );
    foreach( $array as $value )
    {
      if( !$result = mysql_query( $value ))
        break;
    }
    return $result;
	}
	//-----------------------------------------------------------------
	//NAME:DB_INSERT
	//DATE:2-10-05
	//DECRIP: INSERTS DATA(ARRAY) INTO THE SPECIFIED TABLE, ALSO RETURNS THE ID
	//OF THE RECORD
	//-----------------------------------------------------------------
	function DB_INSERT($tb_name,$data){
		
		$field_array = $this->DB_GETFIELDS($tb_name);						//get fields
		array_shift($field_array);											//get rid of the id field
		$one = implode(",", $field_array);									//prepare the field array for insertion to the sql statement
		
		$len = count($data);
		$data1 = array();
		for($i=0;$i<$len;$i++){
			$data1[$i]=addslashes($data[$i]);								//clean the data, replace certain chars with/char
		}
		
		$two = implode("','", $data1);										//prepare the data array for insertion to the sql statement
		$sql = "INSERT INTO $tb_name ($one) VALUES ('$two')";				//prepare the sql statement
		$result = mysql_query($sql);
		if(!$result){
			print "An error has occurred - DB_INSERT<br>".mysql_error()."<BR>";
		}else{
			//print "The record has been inserted<br>";
		}
		$id = mysql_insert_id();
		
		return $id; 
	}
	//-----------------------------------------------------------------
	//NAME:DB_UPDATE
	//DATE:2-10-05
	//DECRIP: UPDATES THE TABLE WITH THE DATA(ARRAY)
	//-----------------------------------------------------------------
	function DB_UPDATE($tb_name,$data){
		$c = $this->DB_CONNECT();
		$field_array = $this->DB_GETFIELDS($tb_name);
		$len = count($field_array);								//count the number of fields
		
		$data1 = array();
		for($i=0;$i<$len;$i++){
			$data1[$i]=addslashes($data[$i]);
			$con[$i] = "$field_array[$i] = '$data1[$i]'";
		}
		$one = implode(",", $con);						//prepare the field array for insertion to the sql statement
		$sql = "update $tb_name SET $one where id='$data[0]' LIMIT 1";
		$result = mysql_query($sql);
		if(!$result){
			print "An error has occurred - DB_UPDATE<br>";
		}else{
			//print "The record has been updated<br>";
		}
		$this->DB_CLOSE($c);
	}
	//-----------------------------------------------------------------
	//NAME:DB_DELETE
	//DATE:2-10-05
	//DECRIP:DELETES THE RECORD THAT IS EQUAL TO THEID FROM THE SPECIFIED
	//TABLE
	//-----------------------------------------------------------------
	function DB_DELETE($tb_name,$theid){
		$c = $this->DB_CONNECT();
		$sql = "DELETE FROM $tb_name WHERE id = $theid";
		$result = mysql_query($sql);
		if(!$result){							  
			print "An error has occurred - DB_DELETE<br>";
		}else{
			//print "The record has been deleted<br>";
		}
		$this->DB_CLOSE($c);
	}
	//-----------------------------------------------------------------
	//NAME:DB_GETFIELDS
	//DATE:2-10-05
	//DECRIP:RETURNS THE NAMES OF ALL THE FIELDS FOR THE SPECIFIED
	//TABLE---------REQUIRES DB CONNECTION BEFORE CALLING--------------
	//-----------------------------------------------------------------
	function DB_GETFIELDS($tb_name){
		$result = mysql_query("SELECT * FROM $tb_name");			
		if (!$result) {
			print "An error has occurred - DB_GETFIELDS";								
		}else{
			$numfields = mysql_num_fields($result);
			for($i=0;$i<$numfields;$i++){							
				$field_array[$i]=mysql_field_name($result, $i);
			}
			
		}
		return $field_array;
	}
	//-----------------------------------------------------------------
	//NAME:DB_NUMRECORDS
	//DATE:2-10-05
	//DECRIP:RETURNS THE NUMBER OF RECORDS IN A TABLE
	//-----------------------------------------------------------------
	function DB_NUMRECORDS($tb_name){
		$c = $this->DB_CONNECT();									//connect to the database
		$result = mysql_query("SELECT * FROM $tb_name");
		if (!$result) {
			print "An error has occurred - DB_NUMRECORDS<br>";								
		}else{
			$num_rows = mysql_num_rows($result);
		}
		$this->DB_CLOSE($c);
		return $num_rows;
	}
	//-----------------------------------------------------------------
	//NAME:DB_FIELDTYPE
	//DATE:2-10-05
	//DECRIP:RETURNS THE TYPE OF FIELDS IN AN ARRAY
	//-----------------------------------------------------------------
	function DB_FIELDTYPE($tb_name){
		$result = mysql_query("SHOW FIELDS FROM $tb_name");
		if (!$result) {											
			print "An error has occurred - DB_FIELDTYPE<br>";
		}else{
			$i=0;
			while ($row = mysql_fetch_array($result)) {
				$field_array[$i]=$row['Type'];
				$i++;
			} 
		}
		return $field_array;
	}
	//-----------------------------------------------------------------
	//NAME:DB_Q
	//DATE:11-12-06
	//DECRIP: EXECUTES A SQL QUERY AND RETURNS THE RESULT	
	//-----------------------------------------------------------------
	function DB_Q($sql, $from=''){
		$c = $this->DB_CONNECT();									//connect to the database
		
		$result = mysql_query($sql);
		if(!$result){
			print "An error has occured - DB_Q - $from<br>".mysql_error();
		}else{
			if(mysql_affected_rows()>0){
			}else{
			}
		}
		return $result;
		$this->DB_CLOSE($c);
	}
}
?>
