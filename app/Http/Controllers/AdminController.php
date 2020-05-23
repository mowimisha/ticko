<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Ticket;
use Illuminate\Support\Facades\Validator;
use Alert;
use Auth;
use Str;
use Illuminate\Support\Facades\Redirect;
use DB;
use Carbon;

class AdminController extends Controller
{

    public function users()
    {
        return View('dev.users.show')
            ->with('users', User::orderBy('created_at', 'desc')->get())
            ->with('users', User::orderBy('created_at', 'desc')->get());
    }

    public function create()
    {
        return view('dev.users.create');
    }

    public function create_user(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'company' => 'required',
            'phone' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('new-user-dev/')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $user = new User();
                $user->name = $request->get('name');
                $user->lastname = $request->get('lastname');
                $user->email = $request->get('email');
                $user->company = $request->get('company');
                $user->phone = $request->get('phone');
                $user->role = 'seller';
                $user->password = bcrypt(str::random(10));
                $user->save();
                alert()->success('User Registered Successfully!', 'Success')->autoclose(3000);
                return back();
            } else {
                alert()->error('Add user fail!, Duplicate email or Invalid credentials', 'Error')->autoclose(3000);
                return back();
            }
        }
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            return view('dev.users.read')->with('users', User::where('id', $user->id)->orderBy('created_at', 'desc'));
        } else {
            return view('dev.users.read');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('dev.users.edit')->with('users', User::where('id', $id)->get());
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company' => 'required',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('edit-user-dev/' . $id)
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            $user = User::findOrFail($id);
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $user->name = $request->get('name');
                $user->lastname = $request->get('lastname');
                $user->email = $request->get('email');
                $user->phone = $request->get('phone');
                $user->company = $request->get('company');
                $user->role = 'seller';
                $password = $request->get('password');
                $confirm_password = $request->get('password_confirmation');
                if ($password != $confirm_password) {
                    alert()->error('Passwords Dont Match! Check passwords and try again', 'Error')->autoclose(2500);
                    return back();
                } else {
                    $user->password = bcrypt($request->get('password'));
                }
                $user->save();
                alert()->success('Update Successful!', 'Success')->autoclose(2500);
                return back();
            }
        }
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        alert()->success('User Deleted Successfully', 'Success')->autoclose(2000);
        return back();
    }

    public function posts()
    {
        return View('dev.posts.show')
            ->with('posts', Post::orderBy('created_at', 'desc')->get());
    }

    public function create_post()
    {
        return view('dev.posts.create');
    }

    public function insert_post(Request $request)
    {
        $post = new Post();
        $post->title = $request->get('title');
        $post->category = $request->get('category');
        $post->description = $request->get('description');
        $post->charges = $request->get('charges');
        $post->location = $request->get('location');
        $post->dates = $request->get('dates');
        $post->feature_status = $request->get('feature_status');
        $post->created_by = Auth::user()->email;
        $post->status = $request->get('status');
        $post->save();
        alert()->success('Post Added Successfully', 'Success')->autoclose(2500);
        return back();
    }

    public function edit_post($id)
    {
        $post = Post::find($id);
        return view('dev.posts.edit')->with('posts', Post::where('id', $id)->get());
    }

    public function update_post(Request $request, $id)
    {
        $rules = array(
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'charges' => 'required',
            'location' => 'required',
            'feature_status' => 'required',
            'status' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('edit-post-dev/' . $id)
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            $post = Post::findOrFail($id);
            if (Auth::user()->role == 'dev' || Auth::user()->role == 'admin') {
                $post->title = $request->get('title');
                $post->category = $request->get('category');
                $post->description = $request->get('description');
                $post->charges = $request->get('charges');
                $post->location = $request->get('location');
                $post->dates = $request->get('dates');
                $post->feature_status = $request->get('feature_status');
                $post->status = $request->get('status');
                $post->save();
                alert()->success('Update Successful!', 'Success')->autoclose(2500);
                return back();
            }
        }
    }

    public function destroy_post($id)
    {
        $post = Post::where('id', $id)->first();
        $post->delete();
        alert()->success('post Deleted Successfully', 'Success')->autoclose(2000);
        return back();
    }


    public function tickets()
    {
        if (Auth::user()->role == 'buyer') {
            return View('dev.tickets.buyer-tickets')
                ->with('tickets', Ticket::orderBy('created_at', 'desc')->get());
        } else if (Auth::user()->role == 'seller') {
            return View('dev.tickets.show')
                ->with('users', User::orderBy('created_at', 'desc')->get())
                ->with('tickets', Ticket::orderBy('created_at', 'desc')->get());
        } else {
            return View('dev.tickets.show')
                ->with('users', User::orderBy('created_at', 'desc')->get())
                ->with('tickets', Ticket::orderBy('created_at', 'desc')->get());
        }
    }

    public function create_ticket()
    {
        return view('dev.tickets.create');
    }

    public function insert_ticket(Request $request)
    {
        $array = $request->get('arrayName');
        $event_name = $request->get('event_name');
        $quantity = $request->get('quantity');
        $item_name = $request->get('item');
        $id = 0;
        ini_set('max_execution_time', 300);
        foreach ($array as $value) {
            $count = $value['quantity'];
            $col = collect($array);
            $total_items = $col->sum('quantity');
            for ($i = 0; $i < $count; $i++) {
                $itemcodes[] = [
                    'id' => $i,
                    'event_title' => $value['event_name'],
                    'crypt_text' => Str::random(20),
                    'reference_no' => mt_rand(100000, 999999),
                    'ticket_status' => '',
                    'validated_by' => '',
                    'validated_on' => '',
                    'booked_by' => [
                        'firstname' => '',
                        'lastname' => '',
                        'email' => '',
                        'phone' => '',
                        'payment_mode' => '',
                        'booking_date' => '',
                    ]

                ];
            }
        }
        $ticket = new Ticket();
        $ticket->batch_no = mt_rand(100000, 999999);
        $ticket->reference_id = mt_rand(100000, 999999);
        $ticket->event_name = $value['event_name'];
        $ticket->quantity = $value['quantity'];
        $ticket->ticket_info = $itemcodes;
        $ticket->created_by = Auth::user()->email;
        $ticket->save();
        alert()->success('tickets Added Successfully', 'Success')->autoclose(2000);
        return back();
    }

    public function validate_ticket()
    {
        return view('dev.tickets.confirm');
    }

    public function check_ticket(Request $request)
    {
        $icode = $request->get('codes');
        $codes = DB::select('select batch_no,ticket_info from tickets');
        foreach ($codes as $ke => $va) {
            $jdecode = json_decode($va->ticket_info);
            foreach ($jdecode as $k => $v) {
                $crypt = $v->crypt_text;
                $status = $v->ticket_status;

                if ($crypt == $icode &&  $status == "booked") {
                    $v->ticket_status = 'deactivated';
                    $v->validated_by = Auth::user()->name . " " . Auth::user()->lastname;
                    $v->validated_on = Carbon\Carbon::parse()->format('Y-m-d h:i:s');
                    $jencode = json_encode($jdecode);
                    DB::update("update tickets set ticket_info = '$jencode' where batch_no = ?", [$va->batch_no]);
                    alert()->success('Received Successfully!', 'Success')->autoclose(2500);
                    return back();
                } elseif ($crypt == $icode && $status == "") {
                    alert()->error(' Ticket Not Booked', 'Error')->autoclose(2500);
                    return back();
                } elseif ($crypt == $icode && $status == "deactivated") {
                    alert()->error(' Ticket Deactivated', 'Error')->autoclose(2500);
                    return back();
                }
            }
            alert()->error('Invalid Item', 'Error')->autoclose(2500);
            return back();
        }
    }

    public function show_ticket($id)
    {
        $ticket = Ticket::where('id', $id)->get();
        foreach ($ticket as $code) {
            $cod = $code->ticket_info;
            $a = $cod;
            $col1 = collect($a);
            $status = $col1->pluck('ticket_status');
            $active = $status->filter(function ($value, $key) {
                return $value == 'booked';
            });
            $inactive = $status->filter(function ($value, $key) {
                return $value == 'deactivated';
            });
            $active_tickets = $active->count();
            $inactive_tickets = $inactive->count();
            // }
            // $ticket = Ticket::where('id', $id)->first();
            if ($ticket) {
                return view('dev.tickets.read')
                    ->with('tickets', Ticket::where('id', $id)->orderBy('created_at', 'desc')->get())
                    ->with('active_tickets', $active_tickets)
                    ->with('inactive_tickets', $inactive_tickets);
            } else {
                return view('dev.tickets.read');
            }
        }
    }

    public function destroy_ticket($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        alert()->success('Success', 'Tickets Deleted Successfully')->autoclose(2500);
        return back();
    }
}
