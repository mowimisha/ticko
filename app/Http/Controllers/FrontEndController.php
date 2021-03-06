<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Post;
use App\User;
use Alert;
use DB;
use Carbon;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('frontend.events')
            ->with('posts', Post::orderBy('created_at', 'desc')->get());
    }

    public function get_event_details($id)
    {
        $post = Post::where('id', $id)->first();
        return view('frontend.event')
            ->with('posts', $post)
            ->with('events', Post::where('id', $id)->orderBy('created_at', 'desc')->get());
    }

    public function buyer()
    {
        return view('frontend.buyer-register');
    }

    public function register_buyer(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => 'buyer'
        ]);

        $codes = DB::select('select batch_no,ticket_info from tickets');
        foreach ($codes as $ke => $va) {
            $jdecode = json_decode($va->ticket_info, true);
            $ticket_collection = collect($jdecode);
            $random_ticket = $ticket_collection->random(1);
            foreach ($random_ticket as $rt) {
                if ($rt['ticket_status'] == '') {
                    $rt['booked_by']['email'] = $request['email'];
                    $rt['booked_by']['phone'] = $request['phone'];
                    $rt['booked_by']['lastname'] = $request['lastname'];
                    $rt['booked_by']['firstname'] = $request['name'];
                    $rt['booked_by']['booking_date'] = Carbon\Carbon::now();
                    $rt['booked_by']['payment_mode'] = 'MPESA';
                    $rt['ticket_status'] = 'booked';
                    $ticket_updated = $ticket_collection->replace([$rt['id'] => $rt]);
                    $update_array = $ticket_updated->toArray();
                    $jencode = json_encode($update_array, true);
                    DB::update("update tickets set ticket_info = '$jencode' where batch_no = ?", [$va->batch_no]);
                    alert()->success('Ticket booked successfully, Login to Get more details about your ticket', 'Success')->autoclose(3000);
                    return redirect('/login');
                }
            }
        }
        alert()->success('Ticket booked successfully, Login to Get more details about your ticket', 'Success')->autoclose(3000);
        return redirect('/login');
    }

    public function seller()
    {
        return view('frontend.seller-register');
    }

    public function register_seller(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => 'seller'
        ]);
        alert()->success('Registration Successful', 'Success')->autoclose(2500);
        return back();
    }
}
