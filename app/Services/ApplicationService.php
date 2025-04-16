<?php

namespace App\Services;

use App\Interfaces\ApplicationInterface;

class ApplicationService{
    protected $applicationRepository;

    public function __construct(ApplicationInterface $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    public function addApplication($application){
        return $this->applicationRepository->addApplication($application);
    }

    public function deleteApplication($applicationId){
        return $this->applicationRepository->deleteApplication($applicationId);
    }

    public function displayMyApplications($participantId){
        return $this->applicationRepository->displayMyApplications($participantId);
    }

    // statistics
    public function countAppOnMyPosts($operatorId){
        return $this->applicationRepository->countAppOnMyPosts($operatorId);
    }
}