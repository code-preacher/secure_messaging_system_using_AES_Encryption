<?php
include_once "config.php";

class Crud extends Config
{

	function __construct()
	{
		parent::__construct();
	}


//Display All
	public function displayAll($table)
	{
		$query = "SELECT * FROM {$table}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}



	public function displayAllWithOrder($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return false;
		}
	}



		public function displayAllWithOrderAndId($table,$orderValue,$orderType,$id)
	{
		$query = "SELECT * FROM {$table} WHERE sender_id={$id} or reciever_id={$id} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return false;
		}
	}


			public function displayAllWithOrderAndId2($table,$orderValue,$orderType,$id)
	{
		$query = "SELECT * FROM {$table} WHERE reciever_id={$id} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return false;
		}
	}

			public function displayAllWithOrderAndId3($table,$orderValue,$orderType,$id)
	{
		$query = "SELECT * FROM {$table} WHERE sender_id={$id} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return false;
		}
	}


	public function displayWithLimit($table,$limit)
	{
		$query = "SELECT * FROM {table} limit {$limit}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return "No found records";
		}
	}




	//Display Specific
	public function displayName($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT name FROM login where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return "No found records";
		}
	}

	

			public function displayProfile($value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM login where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return "No found records";
		}
	}


	public function displayOne($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where email='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}


		public function displayOneSpecific($table,$item,$value)
	{
		$item = $this->cleanse($item);
		$value = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where $item='$value' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}


			public function displayTwoSpecific($table,$item,$value,$item2,$value2)
	{
		$item = $this->cleanse($item);
		$value = $this->cleanse($value);
		$query = "SELECT * FROM {$table} where $item='$value' and $item2='$value2' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}


		public function displayNameById($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT id,name FROM {$table} where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['name'];
		}else{
			return 0;
		}
	}


			public function displayIdByEmail($table,$email)
	{
		$email = $this->cleanse($email);
		$query = "SELECT id,email FROM {$table} where email='$email' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['id'];
		}else{
			return 0;
		}
	}

			public function displayNumberById($table,$value)
	{
		$id = $this->cleanse($value);
		$query = "SELECT id,phone FROM {$table} where id='$id' ";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row['phone'];
		}else{
			return 0;
		}
	}



	
//Counting All
	public function countAll($table)
	{
		$q=$this->con->query("SELECT id FROM {$table}");
		if ($q) {
		    return $q->num_rows;
		} else {
			return 0;
		}
		
		
	}


		public function countAll2($table,$id)
	{
		$q=$this->con->query("SELECT id FROM {$table} WHERE sender_id={$id} or reciever_id={$id}");
		if ($q) {
		    return $q->num_rows;
		} else {
			return 0;
		}
		
		
	}

//Counting Specific
	
	
// Inserting

	public function addUser($value)
	{

		$name = $this->cleanse($_POST['name']);
		$email = $this->cleanse($_POST['email']);
		$phone = $this->cleanse($_POST['phone']);
		$address = $this->cleanse($_POST['address']);
		$password = $this->cleanse($_POST['password']);
		$gender = $this->cleanse($_POST['gender']);

		$query="INSERT INTO user(name,email,phone,address,password,gender) VALUES('$name','$email','$phone','$address','$password','$gender')";
		$query2="INSERT INTO login(name,email,password,role) VALUES('$name','$email','$password','3')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:login.php?msg=Account was created successfully, Please login &type=success");
			$this->con->query($query2);
		}else{
			header("Location:login.php?msg=Error adding data try again!&type=error");
		}
	}



	public function insertMessage($post)
	{
		$sender_id=$this->cleanse($_POST['sender_id']);
		$number=$this->cleanse($_POST['number']);
		$message=$this->cleanse($this->aes_encrypt($_POST['mkey'],$_POST['message']));
		$mkey=$this->cleanse($_POST['mkey']);
		$user=$this->displayOneSpecific('user','phone',$number);
		if ($user) {
		$reciever_id=$user['id'];
		$query="INSERT into message(sender_id,reciever_id,message,mkey) values('$sender_id','$reciever_id','$message','$mkey')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:view-message.php?msg=Message was sent successfully&type=success");
		}else{
			header("Location:view-message.php?msg=Error adding data try again!&type=error");
		}
		} else {
			header("Location:add-message.php?msg=Invalid Recipient Number!&type=error");
		}
		

	}


		public function decryptMessage($post)
	{
		$id=$this->cleanse($_POST['id']);
		$mkey=$this->cleanse($_POST['mkey']);
		$message=$this->cleanse($_POST['message']);
		$key=$this->displayTwoSpecific('message','mkey',$mkey,'message',$message);
		if ($key) {
			header("Location:view-message3.php?id=$id");
		} else {
			header("Location:view-message2.php?id=$id&msg=Invalid Decryption Key!&type=error");
		}
		

	}



	public function aes_encrypt($password,$plaintext)
	{
		$method = 'aes-256-cbc';
// You must store this secret random key in a safe place of your system.
		$key = substr(hash('sha256', $password, true), 0, 32);

// IV must be exact 16 chars (128 bit)
		$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

		return base64_encode(openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv));
	}

	public function aes_decrypt($password,$encrypted)
	{
		$method = 'aes-256-cbc';
// You must store this secret random key in a safe place of your system.
		$key = substr(hash('sha256', $password, true), 0, 32);

// IV must be exact 16 chars (128 bit)
		$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

		return openssl_decrypt(base64_decode($encrypted), $method, $key, OPENSSL_RAW_DATA, $iv);
	}






	
	public function updateAdmin($post)
	{
		$name=$this->cleanse($_POST['name']);
		$email=$this->cleanse($_POST['email']);
		$password=$this->cleanse($_POST['password']);
		$query="UPDATE login SET name='$name',email='$email',password='$password' WHERE email='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:profile.php?msg=Account was updated successfully&type=success");
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}


		public function updateUser($post)
	{
		$email=$this->cleanse($_POST['email']);
		$password=$this->cleanse($_POST['password']);
		$query="UPDATE login SET password='$password' WHERE email='$email' ";
		$query2="UPDATE student SET password='$password' WHERE matno='$email' ";
		$sql=$this->con->query($query);
		if ($sql==true) {
			header("Location:profile.php?msg=Account was updated successfully&type=success");
			$this->con->query($query2);
		}else{
			header("Location:profile.php?msg=Error updating account try again!&type=error");
		}
	}


	//Search
	public function displaySearch($value)
	{
	//Search box value assigning to $Name variable.
		$Name = $this->cleanse($value);
		$query = "SELECT * FROM product WHERE pid LIKE '%$Name%'";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return false;
		}
	}

	//Delete Items
	public function delete($id, $table,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "DELETE FROM {$table} WHERE id = $id";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}
	

	public function deleteTwoTable($matno,$table,$table2,$url) 
	{ 
		$matno = $this->cleanse($matno);
		$query = "DELETE FROM {$table} WHERE matno= $matno";
		$query2 = "DELETE FROM {$table2} WHERE matno= $matno";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Student was successfully deleted&type=success");
			$this->con->query($query2);
		} else {
			header("Location:$url?msg=Error deleting Student&type=error");
		}
	}





	public function cleanse($str)
	{
   #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
		if($str!=''){
			$str=trim($str);
			return mysqli_real_escape_string($this->con,$str);
		}
	}


}

?>

