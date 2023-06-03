<?php
require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Expert.php';

class ExpertsRepository extends Repository
{
    private $stmt;

    public function getExperts($searchTerm): array
    {
        $result = [];
        if ($searchTerm != null) {
            $this->stmt = $this->database->connect()->prepare('
             SELECT * FROM users_details WHERE name LIKE :searchTerm OR profession LIKE :searchTerm OR description LIKE :searchTerm
     ');
            $this->stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
        } else {
            $this->stmt = $this->database->connect()->prepare('SELECT * FROM users_details;');
        }
        $this->stmt->execute();
        $experts = $this->stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($experts as $expert) {
            $result[] = new Expert(
                $expert['name'],
                $expert['description'],
                $expert['profession'],
                $expert['photo'] ?? ""
            );
        }
        return $result;
    }
}