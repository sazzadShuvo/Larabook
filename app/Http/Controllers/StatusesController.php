<?php

namespace App\Http\Controllers;

use App\Events\StatusWasPublished;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Validator;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $loggedInUserId = Auth::user()->id;

        $follows = User::find($loggedInUserId)
                        ->follows()
                        ->get()
                        ->pluck('id')
                        ->toArray();

        $idsForStatus = $follows;
        array_unshift($idsForStatus, $loggedInUserId);

        $statuses = Status::with(['user', 'comments', 'likes'])->whereIn('user_id', $idsForStatus)->latest()->paginate(5);

        if ($request->ajax()) {
            $view = view('status.ajax.status-data', compact('statuses'))->render();
            return response()->json(['html' => $view]);
        }

        return view('status.index', compact('statuses'));
    }

    public function validator($request)
    {
        $rules = [
            'body' => 'required',
        ];

        $messages = [
            'body.required' => 'Status can\'t be empty',
        ];

        Validator::make($request->all(), $rules, $messages)->validate();
    }

    public function store(Request $request)
    {
        $this->validator($request);

        $user = User::find(Auth::user()->id);

        $user->statuses()->create($request->all());

        Event::fire(new StatusWasPublished());

        return redirect()->back();
    }
}
