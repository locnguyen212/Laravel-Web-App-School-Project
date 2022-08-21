<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;

class FeedbackMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = false;
        if(auth()->user()->level != 1){
            $id = auth()->user()->id;
        }
        $data = DB::table('feedback')
                    ->select('feedback.*', 'category.user_id AS user_id')
                    ->join('origami', 'origami.id', '=', 'feedback.origami_id')
                    ->join('category', 'category.id', '=', 'origami.category_id')
                    ->when($id, function($query, $id){
                        return $query->where('category.user_id', $id);
                    })
                    ->whereNull('feedback.deleted_at')
                    ->get();

        $isExist = false;
        foreach($data as $data){
            if($data->id == $request->route()->id){
                $isExist = true;
                break;
            }
        }

        if($isExist){
            return $next($request);
        }else{
            return redirect()->route('admin.feedback.index');
        }
    }
}
