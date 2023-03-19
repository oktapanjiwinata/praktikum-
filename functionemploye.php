<?php
   $db = mysqli_connect("localhost", "root", "", "bab3");


    function query($query){
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }


    function tambah($data){
	global $db;
	// ambil data dari tiap elemen dalam form
	$nama = htmlspecialchars($data["nama"]);
	$id_department = htmlspecialchars($data["id_department"]);

	$query = "INSERT INTO employee
				VALUES
				('', '$nama', '$id_department')
				";
	// query insert data
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
    }

    function ubah($data){
	global $db;
	$id_employe = $data["id_employe"];
	// ambil data dari tiap elemen dalam form
	$nama = htmlspecialchars($data["nama"]);
	$id_department = htmlspecialchars($data["id_department"]);
	$query = "UPDATE employee SET 
				nama = '$nama', 
				id_department ='$id_department'
				WHERE id_employe = $id_employe
			";
	// query insert data
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

    function hapus($id){
        global $db;
        mysqli_query($db, "DELETE FROM employee WHERE id_employe = $id");
        return mysqli_affected_rows($db);
    }

?>