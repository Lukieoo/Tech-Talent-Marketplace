<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users u LEFT JOIN users_details ud 
            ON u.id_users_details = ud.id WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['id'],
            $user['email'],
            $user['password']
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_details (profession, description, photo,name)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $user->getProfession(),
            $user->getDescription(),
            $user->getPhoto(),
            $user->getName()
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, id_users_details)
            VALUES (?, ?, ?)
        ');
        $expertIdDetails = $this->addUserDetailsId($user);
        $this->addExpertLocation($expertIdDetails, $user);
        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $expertIdDetails
        ]);
    }

    public function addExpertLocation(int $expertIdDetails, User $user)
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO location (id_expert_details, latitude, longitude)
        VALUES (?, ?, ?)
    ');
        $stmt->execute([
            $expertIdDetails,
            $user->getLocation()->getLatitude(),
            $user->getLocation()->getLongitude(),
        ]);
    }


    public function addUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.users_details WHERE name = :name AND profession = :profession AND description = :description
    ');
        $stmt->bindValue(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':profession', $user->getProfession(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $user->getDescription(), PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }
}