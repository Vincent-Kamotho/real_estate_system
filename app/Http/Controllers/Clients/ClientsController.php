<?php

namespace App\Http\Controllers\Clients;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\Admin\Listing;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Listing::all();
        $records = Listing::take(8)->get();
        
        
        return view('clients.index')->with('data' , $data)
                                    ->with('records' , $records);
        //return view('clients.index', compact($data));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function searchProperty(Request $request)
    {
        $property_type = $request->property_type;
        $location = $request->location;
        $query = $request->input('query');
        
        // dd($property_type);
        $records = Listing::all();

        $data = Listing::where('property_type' , 'LIKE' , '%' . $property_type . '%')
            ->orWhere('location' , 'LIKE' , '%' . $location . '%')
            ->orWhere('property_name' , 'LIKE' , '%' . $query . '%')
            ->get();

            //dd($data);

            //return view('clients.index', ['data' =>  $data]);

            return view('clients.index')->with('data' , $data)
                                    ->with('records' , $records);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function contact()
    {
        return view('clients.contact');
    }
   
    public function email(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required'
        ]);

        if($this->isOnline()){
            $mail_data = [
                'recipient'=>'vinsentwambugu@gmail.com',
                'fromEmail'=>$request->input('email'),
                'fromName'=>$request->input('name'),
                'subject'=>$request->input('subject'),
                'body'=>$request->input('message'),
            ];

            \Mail::send('clients.mail.contact' , $mail_data, function($message) use ($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'], $mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });

            return redirect()->back()->with('success', 'Email Sent!');
        }else{
            return "No connection";
        } 
    }


    public function isOnline($site = "https://youtube.com"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }
}



