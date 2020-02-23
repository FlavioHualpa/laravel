<?php

class DB
{
  private static $stmt;
  private static $connected;

  public static function getNextSet()
  {
    if (empty(self::$connected)) {
      self::db_connect();
    }

    $data = [];
    $rows = 0;

    while ($rows < 8)
    {
      $read = self::$stmt->fetch(PDO::FETCH_ASSOC);
      if ($read) {
        $data[] = $read;
      }
      else {
        break;
      }
      $rows++;
    }

    $jsonResponse = json_encode($data);
    return $jsonResponse;
  }

  private static function db_connect()
  {
    $conn = 'mysql: host=locahost;port=3316;dbname=sakila';
    $user = 'root';
    $pass = 'digitalhouse';

    $pdo = new PDO(
      $conn,
      $user,
      $pass,
      [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]
    );

    self::$stmt = $pdo->prepare('SELECT * FROM customer');
    self::$stmt->execute();

    self::$connected = true;
  }
}
