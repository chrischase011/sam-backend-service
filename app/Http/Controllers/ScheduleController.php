<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $schedules = $request->user()->schedules()->with('category')->get();
        return response()->json($schedules);
    }

    public function show(Request $request, Schedule $schedule)
    {
        return response()->json($schedule->load('category'));
    }

    public function store(Request $request)
    {
        $schedule = $request->user()->schedules()->create($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date_at' => 'required|date',
            'start_time_at' => 'required|time',
            'end_time_at' => 'required|time',
            'category_id' => 'required|exists:categories,id',
            'color' => 'nullable|string|max:7',
            'icon' => 'nullable|string|max:255',
        ]));
        return response()->json($schedule, 201);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date_at' => 'required|date',
            'start_time_at' => 'required|time',
            'end_time_at' => 'required|time',
            'category_id' => 'required|exists:categories,id',
            'color' => 'nullable|string|max:7',
            'icon' => 'nullable|string|max:255',
        ]));
        return response()->json($schedule);
    }

    public function destroy(Request $request, Schedule $schedule)
    {
        $schedule->delete();
        return response()->json(null, 204);
    }
}
