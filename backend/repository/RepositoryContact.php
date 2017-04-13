<?php
require_once 'lib/Repository.php';

class ContactRepository extends Repository
{
    protected $tableName = 'contact';

    public function create($name, $email, $text)
    {
        $query = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sss', $name, $email, $text);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}
