<?php

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function find($userId)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO users (username, email, password, id_rek) VALUES (:username, :email, :password, :id_rek)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':id_rek' => $data['id_rek']
        ]);
        $userId = $this->pdo->lastInsertId();

        // Create corresponding tree entry
        $this->createTreeEntry($userId, $data['id_rek']);
    }

    private function createTreeEntry($userId, $id_rek)
    {
        if ($userId == 1) {
            $sql = "INSERT INTO tree (id_user, id_rek, col, lvl, road) VALUES (1, 0, 0, 1, '|1|')";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } else {
            $sql = "SELECT * FROM tree WHERE road LIKE CONCAT('%|', :id_rek, '|%') ORDER BY lvl, col ASC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id_rek' => $id_rek]);
            $treeRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($treeRow) {
                $road = $treeRow['road'] . $userId . "|";
                $lvl = count(explode("|", $road)) - 2;

                $sql = "INSERT INTO tree (id_user, id_rek, col, lvl, road) VALUES (:id_user, :id_rek, 0, :lvl, :road)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([
                    ':id_user' => $userId,
                    ':id_rek' => $id_rek,
                    ':lvl' => $lvl,
                    ':road' => $road
                ]);

        $sql = "UPDATE tree SET col = col + 1 WHERE id_user = :id_rek";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_rek' => $id_rek]);
    }
}
    }

    public function delete($userId)
    {
        $user = $this->find($userId);
        if ($user) {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $userId]);

            $this->deleteTreeEntry($userId, $user['id_rek']);
            $this->updateRoadsAfterDeletion($userId, $user['id_rek']);
            $this->updateRekIdAfterDeletion($userId, $user['id_rek']);
        }
    }

    private function deleteTreeEntry($userId, $id_rek)
    {
        $sql = "DELETE FROM tree WHERE id_user = :id_user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_user' => $userId]);

        $sql = "UPDATE tree SET col = col - 1 WHERE id_user = :id_rek";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_rek' => $id_rek]);
    }

    private function updateRoadsAfterDeletion($userId, $id_rek)
    {
        $sql = "UPDATE tree SET road = REPLACE(road, '|$userId|', '|'), lvl = lvl - 1 WHERE road LIKE '%|$userId|%'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }
    private function updateRekIdAfterDeletion($userId, $id_rek)
    {
        $sql = "UPDATE users SET id_rek = :id_rek WHERE id_rek = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_rek' => $id_rek, ':user_id' => $userId]);

        $sql = "UPDATE tree SET id_rek = :id_rek WHERE id_rek = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_rek' => $id_rek, ':user_id' => $userId]);
    }

    // ... другие методы, если необходимо ...
}
?>