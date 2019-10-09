<?php

namespace App\Domain\Test\Model;

class UserAnswer
{
    private $answer;

    private $user;

    private $seenQuestionAt;

    private $answeredAt;

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getSeenQuestionAt()
    {
        return $this->seenQuestionAt;
    }

    /**
     * @return mixed
     */
    public function getAnsweredAt()
    {
        return $this->answeredAt;
    }
}
