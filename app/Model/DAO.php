<?php

class DAO
{
    private $host = "localhost";
    private $db = "id8668068_puissance4";
    private $user = "id8668068_root";
    private $pass = "hajar";
    private $connexion;
     
  public function __construct()
    {
        try {
            $this->connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getJoueur($nom)
    {
        $stmt = $this->connexion->prepare("Select * from player where name like :nom");
        $stmt->execute(['nom' => $nom]);
        return $stmt->fetch();
    }
    public function getAllJoueur()
    { 
        $stmt = $this->connexion->prepare("Select * from player");
        $stmt->execute();
        return $stmt;

    }
    public function incScore($nom){
        $stmt = $this->connexion->prepare("UPDATE player SET score=score+1 WHERE name like :nom");
        $stmt->execute(['nom' => $nom]);
    }


    public function addJoueur($nom)
    {
        return $stmt = $this->connexion->prepare(
            "INSERT INTO player(name, score) VALUES (:nom, 0)"
        )->execute([
            'nom' => $nom,
        ]);
    }
     public function addgame($player,$winner)
    {
        return $stmt = $this->connexion->prepare(
            "INSERT INTO game(player, winner) VALUES (:nom, :winner)"
        )->execute([
            'nom' => $nom,
            'winner' => winner
        ]);
    }

}
