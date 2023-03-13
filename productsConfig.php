<?php

require_once("database.php");

class productsConfig{
    private $id;
    private $SKU;
    private $name;
    private $price;
    private $product_type;
    private $type_value;
    protected $dbCnx;
    
    public function __construct($id=0, $SKU="", $name="", $price="", $product_type="", $type_value="" ){
        $this->id = $id;
        $this->SKU = $SKU;
        $this->name = $name;
        $this->price = $price;
        $this->product_type = $product_type;
        $this->type_value = $type_value;

        $this->dbCnx = new PDO(DB_TYPE. ":host=".DB_HOST.";dbname=".DB_NAME, DB_USER,DB_PWD,[ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);


    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
    return $this->id;
    }

    public function setSKU($SKU){
        $this->SKU = $SKU;
    }

    public function getSKU(){
    return $this->SKU;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
    return $this->name;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getPrice(){
    return $this->price;
    }
        
    public function setProductType($product_type){
        $this->product_type = $product_type;
    }

    public function getProductType(){
    return $this->product_type;
    }
        
    public function setTypeValue($type_value){
        $this->type_value = $type_value;
    }

    public function getTypeValue(){
    return $this->type_value;
    }

public function fetchAll(){
    try{
        $stm = $this->dbCnx->prepare("SELECT * FROM products");
        $stm->execute();
        return $stm->fetchAll();
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}

public function insertData(){
    try{
        $stm = $this->dbCnx->prepare("INSERT INTO products(SKU,name,price,product_type,type_value) values(?,?,?,?,?)");
        $stm->execute([$this->SKU, $this->name, $this->price,$this->product_type,$this->type_value]);
        header("Location: /scandiweb_proj");
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}
        


public function delete($extract_id){
    try{
        $stm = $this->dbCnx->prepare("DELETE FROM products WHERE id IN($extract_id)");

        $stm->execute();

        return $stm->fetchAll();
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}


}

?>