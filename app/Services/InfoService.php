<?php

namespace App\Services;

use App\Interfaces\InfoInterface;

class InfoService
{
    protected $infoRepository;

    public function __construct(InfoInterface $infoRepository)
    {
        $this->infoRepository = $infoRepository;
    }

    public function addInfo($data, $roles)
    {
        return $this->infoRepository->addInfo($data, $roles);
    }
}
