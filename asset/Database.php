<?php
class Database
{

    public $ip = '192.168.101.189';
    public $port = '3307';
    public $servername = 'database';
    public $username = 'root';
    public $password = 'deep70';
    public $dbname = 'Blog';
    public $dbh;
    public function __construct()
    {
        try {
            $this->dbh = new PDO("mysql:host=$this->ip:$this->port;dbname=$this->dbname", $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo '<br>jeel<br>File: ' . __FILE__ . '<br>Line: ' . __LINE__ . '<br><pre>';
            print_r('hey');
            echo '</pre>';
            die();
            return $e->getMessage();
        }
    }

    public function Insertdata($table,$data,$codition=null)
    {
        {
            try {
                $columns = implode(", ", array_keys($data));
                $placeholders = ":" . implode(", :", array_keys($data));
                $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
                $stmt =$this->dbh->prepare($sql);
                foreach ($data as $column => &$value) {
                    $stmt->bindParam(":$column", $value);
                }
                $stmt->execute();
                return $this->dbh->lastInsertId();
            } catch (PDOException $e) {

                return $e->getMessage();
            }
        }
    }

    public function selectData($table,$fieldname,$condition=null)
    {
        try{
            $sql="SELECT $fieldname From $table $condition";
            $stmt=$this->dbh->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $res = $stmt->fetchAll();
            return $res;
        }
        catch (PDOException $e) {
    
            return $e->getMessage();
        }
    }

    public function deleteData($table,$condition=null)
    {
        try{
        $sql="DELETE FROM $table $condition";
            $stmt=$this->dbh->prepare($sql);
            $stmt->execute();
        }catch (PDOException $e) {
                return $e->getMessage();
            }

       
    }

    public function updateData($table, $data, $condition = null)
    {
        try {
            $value2 = array();
            $params = array();

            foreach ($data as $key => $value) {
                array_push($value2, "$key=:$key");
                $params[":$key"] = $value;
            }

            $datavalue = implode(',', $value2);
            $sql = "UPDATE $table SET $datavalue $condition";
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute($params);

            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

?>




