<?php
/**
 * Created by PhpStorm.
 * User: Meed
 * Date: 1/31/2019
 * Time: 7:25 PM
 */

class JoueurModel
{
    private $host = "dz8959rne9lumkkw.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
    private $db = "i3tmzmuiooyf0et6";
    private $user = "abqf3gdvvu7jniur";
    private $pass = "ha593exrs2rvm17v";
    private $conn;

    public function __construct()
    {
        try {
            /* Attempt to connect to MySQL database */
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            //SET THE pdo error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getJoueur($nom)
    {
        $stmt = $this->conn->prepare("Select * from joueurs where nom like :nom");
        $stmt->execute(['nom' => $nom]);
        return $stmt->fetch();
    }
    public function getAllJoueur()
    {
        $stmt = $this->conn->prepare("Select * from joueurs");
        $stmt->execute();
        return $stmt;

    }
    public function incScore($nom){
        $stmt=$this->conn->prepare("UPDATE joueurs SET score=score+1 WHERE nom like :nom");
        $stmt->execute(['nom' => $nom]);
    }


    public function addJoueur($nom)
    {
        return $this->conn->prepare(
            "INSERT INTO joueurs(nom, score) VALUES (:nom, 0)"
        )->execute([
            'nom' => $nom,
        ]);
    }

}