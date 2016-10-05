<?php

namespace App\Http\Middleware;

use Closure;

class CheckGroupBelongsToSurvey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $survey = $request->route('survey');
        $group = $request->route('group');

        if ($survey->id !== $group->survey_id) {
            return redirect('home');
        }

        return $next($request);
    }
}
