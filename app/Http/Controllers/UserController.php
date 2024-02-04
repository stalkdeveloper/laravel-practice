<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use DB;

class UserController extends Controller
{
    public function index(Request $request){
        try {
            /* Get All the Value */
            // $users = User::orderBy('id', 'desc')->get();

            /* Get Value with particular data using pluck */
            // $users = User::orderBy('id', 'desc')->get()->pluck('email', 'name');
            
            $currentDate = Carbon::now();
            $tenYearsAgo = $currentDate->subYears(10)->format('Y-m-d');
            
            $fifteenYearsAgo = $currentDate->subYears(15)->format('Y-m-d');

            /* Less then 10 years and greater then 15 years */
            // $users = User::whereDate('dob', '>', $tenYearsAgo)->whereDate('dob', '<', $fifteenYearsAgo)->orderBy('id', 'desc')->get();

            /* Greater then 10 years and Less then 15 years */
            // $users = User::whereBetween('dob', [$fifteenYearsAgo, $tenYearsAgo])->orderBy('id', 'desc')->get();

            // $users = User::whereDate('dob', '>=', $tenYearsAgo)->whereDate('dob', '<=', $fifteenYearsAgo)->get();

            /* from name I want john or doe */

            /* $users = User::where(function ($query) {
                $query->where('name', 'like', '%' . 'john'.'%');
                $query->orWhere('name','like', '%' . 'Doe'.'%');
            })
            ->get(); */

            // $users = User::whereIn('name', ['john', 'doe'])->get();

            // $users = User::where('name', 'like', '%' . 'john' . '%')->orWhere('name', 'like', '%' .'doe'. '%')->get();

            /* Get Birth User info */
            $getMonth = $currentDate->month;
            $getDay = $currentDate->day;
            $getTime = $currentDate->toTimeString();
            // $users = User::whereMonth('dob', $getMonth)->whereDay('dob', $getDay)->get();

            /* get Expenses Data greater than 50 */
            // $users = User::with('orders')->orderBy('id', 'desc')->get();

            /* $users = User::with(['orders' => function ($query) {
                $query->where('expenses', '>', 50);
            }])->get(); */

            // \Log::info($users);
            return response()->json(['status'=> 'success', 'data'=> $users]);
        } catch (\Throwable $e) {
            \Log::error($e->getMessage().' '.$e->getFile().' '.$e->getLine());
        }
    }
}
