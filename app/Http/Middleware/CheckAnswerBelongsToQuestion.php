<?php

namespace App\Http\Middleware;

use Closure;

class CheckAnswerBelongsToQuestion
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
        $question = $request->route('question');
        $answer = $request->route('answer');

        if ($question->id !== $answer->question_id) {
            return redirect('home');
        }

        return $next($request);
    }
}
