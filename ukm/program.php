<?php

class program{

	private $conn;
	private $table_name="program";

	public $judul;
	public $isi;
	public $harga;
	public $waktu;
	public $kategori;
	public $id_pemilik;
	public $foto;
	public $id_program;

	public function __construct($db){
		$this->conn=$db;
	}

	public function read($id_program=null){
		$query="SELECT * FROM `program`";
		if ($id_program)
		$query="SELECT * FROM `program` WHERE id_program='".$id_program."'";
		$stmt=$this->conn->prepare($query);
		$stmt->execute();

		return $stmt; 
	}

	function readAll($from_record_num,$records_per_page){
		$query="SELECT * FROM ".$this->table_name." 
		LIMIT {$from_record_num}, {$records_per_page} ";

		$stmt= $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function readbyKategori($from_record_num,$records_per_page,$kategori){
		$query="SELECT * FROM ".$this->table_name." WHERE kategori_program = '".$kategori."' LIMIT {$from_record_num}, {$records_per_page} ";

		$stmt= $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}
	function readbyBiaya($from_record_num,$records_per_page,$biaya){
		if($biaya > 0){
			$query="SELECT * FROM ".$this->table_name." WHERE harga_program > 0 LIMIT {$from_record_num}, {$records_per_page} ";
		}else{
			$query="SELECT * FROM ".$this->table_name." WHERE harga_program = 0 LIMIT {$from_record_num}, {$records_per_page} ";
		}
		

		$stmt= $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function create(){
		$query="INSERT INTO ".$this->table_name." SET judul_program=:judul,user_staff=:id,
		isi_program=:isi, harga_program=:harga, waktu_penyelanggaraan=:waktu, 
		kategori_program=:kategori, foto=:foto";		

		$stmt =$this->conn->prepare($query);

		$this->id_pemilik=htmlspecialchars(strip_tags($_SESSION["username"]));
		$this->judul=htmlspecialchars(strip_tags($this->judul));
		$this->harga=htmlspecialchars(strip_tags($this->harga));
		$this->waktu=htmlspecialchars(strip_tags($this->waktu));
		$this->kategori=htmlspecialchars(strip_tags($this->kategori));
		$this->foto=htmlspecialchars(strip_tags($this->foto));

		$stmt->bindParam(":judul",$this->judul);
		$stmt->bindParam(":isi",$this->isi);
		$stmt->bindParam(":harga",$this->harga);
		$stmt->bindParam(":waktu",$this->waktu);
		$stmt->bindParam(":kategori",$this->kategori);
		$stmt->bindParam(":id",$this->id_pemilik);
		$stmt->bindParam(":foto",$this->foto);

		if($stmt->execute()){
			return true;
		}
		else
			return false;
	}
	public function countAll(){
 
	    $query = "SELECT id_program FROM " . $this->table_name . "";
	 
	    $stmt = $this->conn->prepare( $query );
	    $stmt->execute();
	 
	    $num = $stmt->rowCount();
	 
	    return $num;
	}
	public function countAllbyKategori($kategori){
		
	    $query = "SELECT id_program FROM " . $this->table_name . " WHERE kategori_program = '".$kategori."' ";
	 
	    $stmt = $this->conn->prepare( $query );
	    $stmt->execute();
	 
	    $num = $stmt->rowCount();
	 
	    return $num;
	}
	public function countAllbyBiaya($biaya){
		if($biaya = 0){
			$query = "SELECT id_program FROM " . $this->table_name . " WHERE harga_program = 0 ";
		}else{
			$query = "SELECT id_program FROM " . $this->table_name . " WHERE harga_program > 0 ";
		}
 
	    
	 
	    $stmt = $this->conn->prepare( $query );
	    $stmt->execute();
	 
	    $num = $stmt->rowCount();
	 
	    return $num;
	}

	function update(){
		$query="UPDATE ".$this->table_name." SET judul_program=:judul,
		isi_program=:isi, harga_program=:harga, waktu_penyelanggaraan=:waktu, 
		kategori_program=:kategori, foto=:foto WHERE id_program=:id_program";		

		$stmt =$this->conn->prepare($query);

		$this->id_program=htmlspecialchars(strip_tags($this->id_program));
		$this->judul=htmlspecialchars(strip_tags($this->judul));
		$this->harga=htmlspecialchars(strip_tags($this->harga));
		$this->waktu=htmlspecialchars(strip_tags($this->waktu));
		$this->kategori=htmlspecialchars(strip_tags($this->kategori));
		$this->foto=htmlspecialchars(strip_tags($this->foto));

			

		$stmt->bindParam(":judul",$this->judul);
		$stmt->bindParam(":isi",$this->isi);
		$stmt->bindParam(":harga",$this->harga);
		$stmt->bindParam(":waktu",$this->waktu);
		$stmt->bindParam(":kategori",$this->kategori);
		$stmt->bindParam(":id_program",$this->id_program);
		$stmt->bindParam(":foto",$this->foto);

		if($stmt->execute()){
			return true;
		}
		else
			return false;
	}

	function delete(){
		$query="DELETE FROM ".$this->table_name." WHERE id_program = ?";
		$stmt=$this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_program);
		if($stmt->execute()){
	        return true;
		    }else{
		        return false;
		    }

	}	
}

?>