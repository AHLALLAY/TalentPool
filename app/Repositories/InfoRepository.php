<?php

namespace App\Repositories;

use App\Interfaces\InfoInterface;
use App\Models\Operator;
use App\Models\Participant;
use InvalidArgumentException;

class InfoRepository implements InfoInterface{
    public function addInfo(array $data, string $roles)
    {
        switch (strtolower($roles)) {
            case 'operator':
                return Operator::create($data);
            case 'participant':
                return Participant::create($data);
            default:
                throw new InvalidArgumentException("Rôle non supporté: {$roles}");
        }
    }
}