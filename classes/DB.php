<?php

class DB
{

    private  $conn;
    public $pdo;
    
    public function __construct() {
        $serverName = DB_HOST;
        $connectionOptions = array(
            "Database" => DB_NAME,
            "Uid" => DB_UID,
            "PWD" => DB_PSSW
        );

        $this->conn = sqlsrv_connect($serverName, $connectionOptions);

        if ($this->conn === false) {
            die(print_r(sqlsrv_errors(), true));
        } else {
          //  echo 'Connesso con successo tramite SQLSRV';
        }

  // Connessione PDO
  $dsn = "sqlsrv:Server=" . DB_HOST . ";Database=" . DB_NAME;
  $username = DB_UID;
  $password = DB_PSSW;

  try {
      $this->pdo = new PDO($dsn, $username, $password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // echo 'Connesso con successo tramite PDO<br>';
  } catch (PDOException $e) {
      die("Connessione fallita: " . $e->getMessage());
  }

    }

    public function selectAll($tableName, $columns = []) {
        $columnsList = $columns ? implode(", ", $columns) : '*';
        $query = "SELECT $columnsList FROM $tableName";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if ($results) {
            foreach ($results as $row) {
               // var_dump($row);
            }
        } else {
            echo "0 results";
        }
        
        return $results;
    }

    public function selectOne($tableName, $columns = [], $id) {
        $columnsList = $columns ? implode(", ", $columns) : '*';
        $query = "SELECT $columnsList FROM $tableName WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteById($tableName, $id) {
        $query = "DELETE FROM $tableName WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);

        return $stmt->rowCount();
    }

    public function updateOne($tableName, $id, $columns = []) {
        $setPart = '';
        foreach ($columns as $colName => $colValue) {
            $setPart .= "$colName = :$colName, ";
        }
        $setPart = rtrim($setPart, ", ");
        
        $query = "UPDATE $tableName SET $setPart WHERE id = :id";
        $stmt = $this->pdo->prepare($query);

        $columns['id'] = $id;
        $stmt->execute($columns);

        return $stmt->rowCount();
    }

    public function insertOne($tableName, $columns = []) {
        $colNames = implode(", ", array_keys($columns));
        $colValues = ":" . implode(", :", array_keys($columns));
        
        $query = "INSERT INTO $tableName ($colNames) VALUES ($colValues)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($columns);

        return $this->pdo->lastInsertId();
    }
    public function __destruct() {
        // Rilascia risorse SQLSRV
        if ($this->conn !== null) {
            sqlsrv_close($this->conn);
        }

        // Chiudi connessione PDO
        $this->pdo = null;
    }


    public function query($sql)
    {
        try {

            $q = $this->pdo->query($sql);
            if (!$q) {
                throw new Exception("errore nella query");
                return;
            }

            $data = $q->fetchAll();
            return $data;
        } catch (Exception $e) {
            throw $e;
        }
    }


    
}


Class DBManager{
    protected $db;
    protected $columns;
    protected $tableNames;

    public function __construct(){
        $this->db=new DB();
    }


    public function get($id){
        $resultArr =$this->db->selectOne($this->tableNames, $this->columns, (int)$id);
        return (object) $resultArr;

    }

    public function getAll(){
        $results =$this->db->selectAll($this->tableNames, $this->columns);
        $object = array();
        foreach ($results as $res) {
            array_push($object,(object)$res);
        }
        return $object;
    }


    public function create($obj){
        $newId=$this->db->insertOne($this->tableNames,(array)$obj);
        return $newId;
    }
    public function delete($id){
        $rowsDeleted =$this->db->deleteById($this->tableNames, (int)$id);
          return (int)$rowsDeleted;

        }
        public function update($id){
            $rowsUpdated= $this->db->updateOne($this->tableNames, (array)$obj, (int)$id);
            return (int) $rowsUpdated;

        }
    } 
