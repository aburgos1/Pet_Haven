<?php

class pethavenAPI{
private $db;

        function _construct(){
        $this->db = new mysqli("a2ss23.a2hosting.com", "pethaven_user", "havenpet.", "pethaven_data");
        $this->db->autocommit(FALSE);
 
}
       
        function __destruct() {
        $this->db->close();
        }
	
	function testing() {
        
        $stmt = $this->db->prepare("SELECT animal_ID, animal_name FROM animal WHERE species = 'dog' AND adopted = 0");
        $stmt->execute();
        $stmt->bind_result($animal_ID, $animal_name);
        while ($stmt->fetch()) {
            echo "$animal_ID  $animal_name";
        }
        $stmt->close();
    }
}

$api = new pethavenAPI;
$api -> testing();

?>