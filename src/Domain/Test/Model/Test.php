<?php

namespace App\Domain\Test\Model;

class Test
{
    private $name;

    private $description;

    private $questions = [];

    /**
     * @param string $name
     */
    public function rename(string $name): void
    {
        $this->name = $name;
    }

    public function changeDescription(string $description): void
    {
        $this->description = $description;
    }

    public function addQuestion(Question $question): void
    {
        $this->questions[] = $question;
    }
}
