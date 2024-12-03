<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CompanyDetail;

class CompanyDetailPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAssigned(User $user, CompanyDetail $companyDetail)

    
    {
        // Check if the user has the Lubricant Evaluator role
        return $user->hasRole('Lubricant Evaluator') && $companyDetail->user_id === $user->id;
    }
}
