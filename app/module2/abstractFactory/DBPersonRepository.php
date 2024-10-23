<?php

namespace App\Module2\AbstractFactory;

use PDO;

class DBPersonRepository implements PersonRepositoryInterface
{
    protected PDO $connection;

    public function __construct()
    {
        $dsn = 'mysql:dbname=course_content_management;host=mysql';
        $user = 'root';
        $password = 'api';
        var_dump('resr');
        exit();
        $this->connection = new PDO($dsn, $user, $password);
        var_dump($this->connection);
        exit();
    }

    public function savePerson(Person $person): void
    {
        $sql = "INSERT INTO people (name, age) VALUES (?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$person->name, $person->age]);
    }

    public function readPeople(): array
    {
        $stmt = $this->connection->query("SELECT name, age FROM people");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Person');
    }

    public function readPerson(string $name): ?Person
    {
        $sql = "SELECT name, age FROM people WHERE name = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$name]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Person');
        $person = $stmt->fetch();
        return $person ?: null;
    }
}