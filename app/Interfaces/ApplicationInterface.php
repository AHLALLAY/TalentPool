<?php

namespace App\Interfaces;

interface ApplicationInterface
{
    public function addApplication($applicationData); // pour le condidat
    public function deleteApplication($applicationId); // pour le condidat
    public function displayMyApplications($participantId); // pour le condidat

    // statistics
    public function countAppOnMyPosts(int $operatorId);  // pour le recruteur
}