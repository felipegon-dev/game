<?php

namespace App\Models;

class Player
{

    /**
     * @var string
     */
    private $name;

    /**
     * Player constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }


    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }


}
