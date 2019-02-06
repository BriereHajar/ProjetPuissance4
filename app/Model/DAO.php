<?php

class DAO
{
    private $host = "uf63wl4z2daq9dbb.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
    private $db = "ywspsa7m8cj26wtj";
    private $user = "qs9x7pz7kmxhd5yg";
    private $pass = "iz1bcx0zet1kxp2j";
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

}
