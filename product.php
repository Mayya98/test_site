<?php
class Product {

    private $conn;
    private $table_name = "products";


    public $SKU;
    public $Name;
    public $Price;
    public $Type;
	public $Size;
    public $Weight;
	public $Dimension;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {

 
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    SKU=:SKU, Name=:Name, Price=:Price, Size=:Size, Weight=:Weight, Dimension=:Dimension";

        $stmt = $this->conn->prepare($query);

        // опубликованные значения 
        $this->SKU=htmlspecialchars(strip_tags($this->SKU));
		$this->Name=htmlspecialchars(strip_tags($this->Name));
        $this->Price=htmlspecialchars(strip_tags($this->Price));
        $this->Size=htmlspecialchars(strip_tags($this->Size));
        $this->Weight=htmlspecialchars(strip_tags($this->Weight));
		$this->Dimension=htmlspecialchars(strip_tags($this->Dimension));

	
        // привязываем значения 
        $stmt->bindParam(":SKU", $this->SKU);
		$stmt->bindParam(":Name", $this->Name);
        $stmt->bindParam(":Price", $this->Price);
        $stmt->bindParam(":Size", $this->Size);
        $stmt->bindParam(":Weight", $this->Weight);
        $stmt->bindParam(":Dimension", $this->Dimension);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }


	}
	
}
?>