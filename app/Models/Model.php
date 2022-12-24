<?php

namespace  App\Models;

use PDO;
use Database\DBConnection;
use Pager;

abstract class Model
{

  protected $db;
  protected $table;

  public function __construct(DBConnection $db)
  {
    $this->db = $db;
  }

  public function all()
  {
    //    $statement = $this->db->getPDO()->query("SELECT * FROM {$this->table}");
    //    $statement->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
    //    return $statement->fetchAll();
    $limit = 6;
    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $page_number = $page_number < 1 ? 1 : $page_number;
    $offset = ($page_number - 1) * $limit;

    return  $this->query("SELECT * FROM {$this->table} ORDER BY id desc limit $limit offset $offset");
  }

  public function findById($id)
  {
    //    $statement = $this->db->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id = ?");
    //    $statement->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
    //    $statement->execute([$id]);
    //    return $statement->fetch();
    return  $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
  }

  // public function create(array $data, $relations = null)
  // {

  //   $firstParenthesis = "";
  //   $secondParenthesis = "";
  //   $i = 1;

  //   foreach ($data as $key => $value) {
  //     $comma = $i === count($data) ? "" : ", ";
  //     $firstParenthesis .= "{$key}{$comma}";
  //     $secondParenthesis .= ":{$key}{$comma}";
  //     $i++;
  //   }

  //   return $this->query("INSERT INTO {$this->table} ($firstParenthesis) VALUES ($secondParenthesis)", $data);
  // }

  public function create(array $data, $relations = null)
  {
    $firstParenthesis = "";
    $secondParenthesis = "";
    $i = 1;

    foreach ($data as $key => $value) {
      $comma = $i === count($data) ? "" : ", ";
      $firstParenthesis .= "{$key}{$comma}";
      $secondParenthesis .= ":{$key}{$comma}";
      $i++;
    }

    return $this->query("INSERT INTO {$this->table} ($firstParenthesis) VALUES ($secondParenthesis)", $data);
  }




  public function update(int $id, array $data)
  {
    $splRaquestPart = "";
    $i = 1;

    foreach ($data as $key => $value) {
      $comma = $i === count($data) ? "" : ", ";
      $splRaquestPart .= "{$key} = :{$key}{$comma}";
      $i++;
    }

    $data['id'] = $id;

    return $this->query("UPDATE {$this->table} SET {$splRaquestPart} WHERE id = :id", $data);
  }
  // $sql = "UPDATE {$this->table} SET categorie = :categorie, description = :description WHERE id = :id ";

  public function destroy($id)
  {
    return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
  }


  public function query($sql, array $param = null, $single = null)
  {
    $method = is_null($param) ? 'query' : 'prepare';

    if (strpos($sql, 'DELETE') === 0 || strpos($sql, 'UPDATE') === 0 || strpos($sql, 'CREATED')) {
      $statement = $this->db->getPDO()->$method($sql);
      $statement->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
      return $statement->execute($param);
    }


    $fetch = is_null($single) ? 'fetchAll' : 'fetch';

    $statement = $this->db->getPDO()->$method($sql);
    $statement->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

    if ($method === 'query') {
      return $statement->$fetch();
    } else {
      $statement->execute($param);
      return $statement->$fetch();
    }
  }
}
