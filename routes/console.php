<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('planner:send-reminders')->dailyAt('08:00');
