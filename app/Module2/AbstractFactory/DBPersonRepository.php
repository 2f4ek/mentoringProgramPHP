<?php

namespace App\Module2\AbstractFactory;

use PDO;

class DBPersonRepository implements PersonRepositoryInterface
{
    protected PDO $connection;

    public function __construct()
    {
        $this->connection = new PDO('mysql:dbname=db_name;host=mysql', 'root', 'api');
    }

    public function savePerson(Person $person): void
    {
        $stmt = $this->connection->prepare("INSERT INTO people (name, iq) VALUES (?, ?)");
        $stmt->execute([$person->getName(), $person->getIq()]);
    }

    public function readPeople(): array
    {
        return $this->connection->query("SELECT name, iq FROM people")->fetchAll(PDO::FETCH_CLASS, Person::class);
    }

    public function readPerson(string $name): Person
    {
        $stmt = $this->connection->prepare("SELECT name, iq FROM people WHERE name = ?");
        $stmt->execute([$name]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Person::class);

        $person = $stmt->fetch();

        if (!$person) {
            throw new \InvalidArgumentException("Person not found!");
        }

        return $person;
    }

    public function updatePerson(Person $personToUpdate): void
    {
        // TODO: Implement updatePerson() method.
    }
}