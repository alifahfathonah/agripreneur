<?php

class konsultan{

	private $conn;
	private $table_name="konsultan";

	public $nama;
	public $isi;
	public $harga;
	public $kategori;
	public $id_pemilik;
	public $foto;
	public $id_konsultan;

	public function __construct($db){
		$this->conn=$db;
	}

	public function read($id_konsultan=null){
		$query="SELECT * FROM `konsultan`";
		if ($id_konsultan)
		$query="SELECT * FROM `konsultan` WHERE id_konsultan='".$id_konsultan."'";
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

	function create(){
		$query="INSERT INTO ".$this->table_name." SET nama_konsultan=:nama,user_staff=:id,
		isi_konsultan=:isi, harga_konsultan=:harga,  
		kategori_konsultan=:kategori, foto=:foto";		

		$stmt =$this->conn->prepare($query);

		$this->id_pemilik=htmlspecialchars(strip_tags($_SESSION["username"]));
		$this->nama=htmlspecialchars(strip_tags($this->nama));
		$this->harga=htmlspecialchars(strip_tags($this->harga));
		$this->kategori=htmlspecialchars(strip_tags($this->kategori));
		$this->foto=htmlspecialchars(strip_tags($this->foto));

		$stmt->bindParam(":nama",$this->nama);
		$stmt->bindParam(":isi",$this->isi);
		$stmt->bindParam(":harga",$this->harga);
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
 
	    $query = "SELECT id_konsultan FROM " . $this->table_name . "";
	 
	    $stmt = $this->conn->prepare( $query );
	    $stmt->execute();
	 
	    $num = $stmt->rowCount();
	 
	    return $num;
	}

	function update(){
		$query="UPDATE ".$this->table_name." SET nama_konsultan=:nama,
		isi_konsultan=:isi, harga_konsultan=:harga,
		kategori_konsultan=:kategori, foto=:foto WHERE id_konsultan=:id_konsultan";		

		$stmt =$this->conn->prepare($query);

		$this->id_konsultan=htmlspecialchars(strip_tags($this->id_konsultan));
		$this->nama=htmlspecialchars(strip_tags($this->nama));
		$this->harga=htmlspecialchars(strip_tags($this->harga));
		$this->kategori=htmlspecialchars(strip_tags($this->kategori));
		$this->foto=htmlspecialchars(strip_tags($this->foto));

			

		$stmt->bindParam(":nama",$this->nama);
		$stmt->bindParam(":isi",$this->isi);
		$stmt->bindParam(":harga",$this->harga);
		$stmt->bindParam(":kategori",$this->kategori);
		$stmt->bindParam(":id_konsultan",$this->id_konsultan);
		$stmt->bindParam(":foto",$this->foto);

		if($stmt->execute()){
			return true;
		}
		else
			return false;
	}

	function delete(){
		$query="DELETE FROM ".$this->table_name." WHERE id_konsultan = ?";
		$stmt=$this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_konsultan);
		if($stmt->execute()){
	        return true;
		    }else{
		        return false;
		    }

	}	
}

?>