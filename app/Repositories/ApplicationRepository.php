<?php

namespace App\Repositories;

use App\Interfaces\ApplicationInterface;
use App\Models\Application;
use Illuminate\Support\Facades\App;

class ApplicationRepository implements ApplicationInterface
{
    public function addApplication($applicationData)
    {
        return Application::create($applicationData);
    }

    public function deleteApplication($applicationId)
    {
        $app = Application::findOrFail($applicationId);
        return $app->delete();
    }

    public function displayMyApplications($participantId)
    {
        $applications = Application::with('post')
            ->where('participant_id', $participantId)
            ->get();

        return $applications;
    }

    public function changeStatus($applicationId, $newStatus)
    {
        try {
            $application = Application::find($applicationId);
            $application->status = $newStatus;
            $application->save();

            return $application;

        } catch (\Exception $e) {
            throw $e;
        }
    }

    // statistics
    public function countAppOnMyPosts($operatorId)
    {
        return Application::join('posts', 'applications.post_id', '=', 'posts.id')
            ->where('posts.operator_id', $operatorId)
            ->count();
    }
}