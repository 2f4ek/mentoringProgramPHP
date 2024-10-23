<?php

namespace App\Module2\AbstractFactory;

use PDO;

class DBPersonRepository implements PersonRepositoryInterface
{
    protected const string ALIAS = 'Person';

    protected PDO $connection;

    public function __construct()
    {
        $this->connection = new PDO('mysql:dbname=db_name;host=mysql', 'root', 'api');
    }

    public function savePerson(Person $person): void
    {
        $stmt = $this->connection->prepare("INSERT INTO people (name) VALUES (?)");
        $stmt->execute([$person->name]);
    }

    public function readPeople(): array
    {
        return $this->connection->query("SELECT name FROM people")->fetchAll(PDO::FETCH_CLASS, self::ALIAS);
    }

    public function readPerson(string $name): ?Person
    {
        $stmt = $this->connection->prepare("SELECT name FROM people WHERE name = ?");
        $stmt->execute([$name]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::ALIAS);

        return $stmt->fetch();
    }
}