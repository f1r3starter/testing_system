<?php

namespace App\Controller;

use App\Repository\TestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    /**
     * @var TestRepository
     */
    private $testRepository;

    public function __construct(TestRepository $testRepository)
    {

        $this->testRepository = $testRepository;
    }

    public function getUserTests()
    {

    }
}
