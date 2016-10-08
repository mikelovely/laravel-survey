<?php

namespace App\Http\Middleware;

use Closure;

class CheckQuestionBelongsToGroup
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
        $group = $request->route('group');
        $question = $request->route('question');

        if ($group->id !== $question->group_id) {
            return redirect('home');
        }

        return $next($request);
    }
}
