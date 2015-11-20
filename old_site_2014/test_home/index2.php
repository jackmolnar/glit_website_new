<?


 $connect = mysql_connect("internal-db.s33581.gridserver.com", "db33581_jonm", "thunder!");
        mysql_select_db("db33581_flash", $connect);
        $result = mysql_query("SELECT * FROM test_table");
        $cant = 0;
        while($row=mysql_fetch_array($result)){
            echo "name$cant=$row[name]&description$cant=$row[description]&category$cant=$row[category]photo_url$cant=$row[photo_url]&";
            $cant++;
        }
        echo "cant=$cant";
		
		

?>