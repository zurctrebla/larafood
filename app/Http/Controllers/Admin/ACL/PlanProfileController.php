<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $plan, $profile;

    public function __construct(Plan $plan, Profile $profile)
    {
        $this->plan = $plan;
        $this->profile = $profile;
    }

    public function profiles($idPlan)
    {

        if(!$plan = $this->plan->find($idPlan)){
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profiles.profiles', compact('plan', 'profiles'));
    }

    public function plans($idProfile)
    {

        if(!$profile = $this->profile->find($idProfile)){
            return redirect()->back();
        }

        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plans.plans', compact('profile', 'plans'));
    }

    public function profilesAvailable(Request $request, $idPlan)
    {

        if(!$plan = $this->plan->find($idPlan)){
            return redirect()->back();
        }

        $filters = $request->except('_token');

        // $permissions = $this->permission->paginate();

        $profiles = $plan->profilesAvailable($request->filter);    /**executa a ação que está na model */

        return view('admin.pages.plans.profiles.available', compact('plan', 'profiles', 'filters'));

    }


    public function attachProfilesPlan(Request $request, $idPlan)
    {

        if(!$plan = $this->plan->find($idPlan)){
            return redirect()->back();
        }

        // dd($request->permissions);
        if(!$request->profiles || count($request->profiles) == 0){
            return redirect()->back()->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plans.profiles', $plan->id);

    }

    public function detachProfilesPlan($idPlan, $idProfile)
    {
        $plan = $this->plan->find($idPlan);
        $profile = $this->profile->find($idProfile);

        if(!$plan || !$profile){
            return redirect()->back();
        }

        $plan->profiles()->detach($profile);

        return redirect()->route('plans.profiles', $plan->id);
    }
}
