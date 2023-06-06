<?php
require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Expert.php';
require_once __DIR__ . '/../models/MapModel.php';
require_once __DIR__ . '/../models/Location.php';

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
                $expert['id'],
                $expert['photo'] ?? ""
            );
        }
        return $result;
    }

    public function getExpertFromID(int $id): ?Expert
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users u LEFT JOIN users_details ud 
            ON u.id_users_details = ud.id WHERE id_users_details = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $expert = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$expert) {
            return null;
        }
        $expert = new Expert(
            $expert['name'],
            $expert['description'],
            $expert['profession'],
            $id,
            $expert['photo'] ?? ""
        );
        $expert->setEmail($this->getExpertEmail($id));
        return $expert;
    }

    private function getExpertEmail(string $id): string
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM users WHERE id_users_details = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user['email'] ?? "";
    }

    public function updateExpert($id, $profession, $description, $name)
    {
        $stmt = $this->database->connect()->prepare('
    UPDATE users_details SET name=:name, profession=:profession, description=:description WHERE id=:id
    ');
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":profession", $profession, PDO::PARAM_STR);
        $stmt->bindParam(":description", $description, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getExpertsWithLocation(): array
    {

        $AllStmt = $this->database->connect()->prepare('SELECT * FROM location;');
        $AllStmt->execute();
        $locations = $AllStmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($locations as $location) {
            $expert = $this->getExpertfromLocation($location['id_expert_details']);
            $result[] = new MapModel(
                new Location($location['latitude'], $location['longitude']),
                $expert->getName(),
                $expert->getPhoto(),
                $expert->getId()

            );
        }

        return $result;
    }

    public function getExpertfromLocation(int $id): ?Expert
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM location u LEFT JOIN users_details ud 
            ON u.id_expert_details = ud.id WHERE id_expert_details = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $expert = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$expert) {
            return null;
        }
        return new Expert(
            $expert['name'],
            $expert['description'],
            $expert['profession'],
            $id,
            $expert['photo'] ?? ""
        );
    }
}