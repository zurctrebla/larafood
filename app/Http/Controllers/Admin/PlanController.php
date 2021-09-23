<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {
        $plans = $this->repository->latest()->paginate();

        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data/* $request->all() */);

        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);

    }

    public function destroy($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
            return redirect()->back();

        // return view('admin.pages.plans.show', [
        //     'plan' => $plan
        // ]);
        $plan->delete();

        return redirect()->route('plans.index');

    }

    public function search(Request $request)
    {
        // dd($request->all());
        $filters = $request->except('_token');

        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }

    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
            return redirect()->back();

        return view('admin.pages.plans.edit',[
            'plan' => $plan
        ]);

    }

    public function update(Request $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
            return redirect()->back();

        // dd($request->all());
        $plan->update($request->all());

        return redirect()->route('plans.index');
    }
}
