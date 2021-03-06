<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObjectiveRequest;
use App\Team;
use App\Objective;

class ObjectiveController extends Controller
{
    public function create($teamId)
    {
        $team = Team::findOrFail($teamId);

        return view('team.objective.create')->with(compact('team'));
    }

    public function store(ObjectiveRequest $request, $teamId)
    {
        $team = Team::findOrFail($teamId);
        $attrs = $request->except('_token');
        $objective = new Objective;
        $objective->fill($attrs);
        $team->objectives()->save($objective);

        return redirect()->route('team.show', $teamId);
    }

    public function show($id)
    {
        $objective = Objective::findOrFail($id);
        $owner = $objective->ownable;

        return view('objective.show')->with(compact('objective', 'owner'));
    }
}
