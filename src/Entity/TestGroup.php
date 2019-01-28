<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class TestGroup
{
    private $name;

    private $id;

    private $tests;

    public function __construct()
    {
        $this->tests = new ArrayCollection();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Collection|Test[]
     */
    public function getTests(): Collection
    {
        return $this->tests;
    }

    public function addTest(Test $test): self
    {
        if (!$this->tests->contains($test)) {
            $this->tests[] = $test;
        }

        return $this;
    }

    public function removeTest(Test $test): self
    {
        if ($this->tests->contains($test)) {
            $this->tests->removeElement($test);
        }

        return $this;
    }
}
