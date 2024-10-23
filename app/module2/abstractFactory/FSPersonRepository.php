<?php

namespace App\Module2\AbstractFactory;

class FSPersonRepository implements PersonRepositoryInterface
{
    public function __construct(protected string $filename = 'default.txt')
    {
        if (!\file_exists($this->filename)) {
            \file_put_contents($this->filename, \serialize([]));
        }
    }

    public function savePerson(Person $person): void
    {
        $people = $this->readPeople();
        $people[] = $person;
        file_put_contents($this->filename, serialize($people));
    }

    public function readPeople(): array
    {
        $content = file_get_contents($this->filename);
        return \unserialize($content);
    }

    public function readPerson(string $name): ?Person
    {
        $people = $this->readPeople();
        foreach ($people as $person) {
            if ($person->name === $name) {
                return $person;
            }
        }
        return null;
    }
}
