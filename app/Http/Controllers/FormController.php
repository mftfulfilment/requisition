<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\Requisitions;
use App\requests;
use App\agents;
use App\Mail\ApprovedMail;
use App\Mail\RequisitionMail1;
use App\Mail\RequisitionMail2;
use App\Mail\RequisitionMail3;
use App\Mail\RequisitionMail5;
use App\Mail\RequisitionMail6;
use App\Mail\RequisitionMail7;
use App\Mail\RequisitionMail8;
use App\Mail\RequisitionMail9;
use App\Mail\RequisitionMail10;
use App\Mail\RequisitionMail11;
use App\Mail\RequisitionMail12;
use App\Mail\Requisitionmail4;
use Illuminate\Support\Facades\Mail;


class FormController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }
    public function index2()
    {
        //return view('index');
        $forms = Form::orderBy('id', 'DESC')->paginate(15);
        $forms->sortBy('id', SORT_REGULAR, false);

        $approved_count = Form::where('feedback', 'Approved')->count();
        $declined_count = Form::where('feedback', 'Disapproved')->count();
        $pending_count = Form::where('feedback', 'pending')->count();
        $total = Form::count();

        return view('approval', compact('forms', 'approved_count', 'declined_count', 'pending_count', 'pending_count', 'total'));
    }
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'Country' => 'required',
            'department' => 'required'

        ]);

        $item = $request->Item;
        $quantity = $request->quantity;
        $cost = $request->cost;


        foreach ($item as $key => $value) {
            if ($item[$key] == null || $quantity[$key] == null || $cost[$key] == null) {
                // abort(422, 'Please fill all required fields');
                return redirect()->back()->withErrors(['Please fill all required fields']);
            }
        }
        $data = $request->all();
        $form = Form::create($data);
        $lastid = $form->id;
        if (count($request->Item) > 0) {
            foreach ($request->Item as $product => $v) {
                $data2 = array(
                    'req_id' => $lastid,
                    'Item' => $request->Item[$product],
                    'description' => $request->description[$product],
                    'quantity' => $request->quantity[$product],
                    'cost' => $request->cost[$product],
                    'total' => $request->total[$product]
                );
                Requisitions::insert($data2);
            }
        }

        $form = Form::find($lastid);


        $url_1 = env('APP_URL') . '/disapprovalReason/' . $lastid;
        $url_2 = env('APP_URL') . '/approve_1/' . $lastid;
        $url_3 = env('APP_URL') . '/approve_3/' . $lastid;


        $country = $request->Country;


        Mail::to($request->email)->send(new Requisitionmail4($form));

        if ($country == 'Kenya') {
            Mail::to($request->department)->send(new RequisitionMail1($form, $url_1, $url_2));
        } elseif ($country == 'Uganda') {
            Mail::to($request->department)->send(new RequisitionMail7($form, $url_1, $url_3));
        } elseif ($country == 'Tanzania') {
            Mail::to($request->department)->send(new RequisitionMail9($form, $url_1, $url_3));
        } elseif ($country == 'Rwanda') {
            Mail::to($request->department)->send(new RequisitionMail10($form, $url_1, $url_3));
        } elseif ($country == 'Nigeria') {
            Mail::to($request->department)->send(new RequisitionMail11($form, $url_1, $url_3));
        } else {
            Mail::to($request->department)->send(new RequisitionMail12($form, $url_1, $url_3));
        }

        return redirect()->route('index')
            ->with('success', 'Requisition has been made successfully.');
    }
    public function store2(Request $request)
    {
        // return $request->all();
        $request->validate([
            'requisitionNo' => 'required',
            'AgentName' => 'required',
            'AgentPhone' => 'required',
            'RequisitionerName' => 'required',
            'RequisitionerEmail' => 'required|email'
        ]);


        $orderID = $request->orderID;
        $from = $request->from;
        $to = $request->to;
        $amount = $request->amount;

        foreach ($orderID as $key => $value) {
            if ($orderID[$key] == null || $from[$key] == null || $to[$key] == null || $amount[$key] == null) {
                // abort(422, 'Please fill all required fields');
                return redirect()->back()->withErrors(['Please fill all required fields']);
            }
        }
        $data = $request->all();
        $agents = agents::create($data);
        $lastid = $agents->id;
        if (count($request->orderID) > 0) {
            foreach ($request->orderID as $product => $v) {
                $data2 = array(
                    'requisition_id' => $lastid,
                    'QTY' => $request->QTY[$product],
                    'orderID' => $request->orderID[$product],
                    'from' => $request->from[$product],
                    'to' => $request->to[$product],
                    'airtime' => $request->airtime[$product],
                    'amount' => $request->amount[$product]
                );
                requests::insert($data2);
            }
        }

        $lastid = $agents->id;
        $agents = agents::find($lastid);


        $url_1 = env('APP_URL') . '/disapprove/' . $lastid;
        $url_2 = env('APP_URL') . '/requests/' . $lastid;


        Mail::send(new RequisitionMail5($agents));
        Mail::send(new RequisitionMail6($agents, $url_1, $url_2));

        return redirect()->route('index2')
            ->with('success2', 'Requisition has been made successfully.');
    }


    public function requisitions($id, Request $request)
    {
        $products = Requisitions::with(['form' => function ($query) {
            $query->setEagerLoads([]);
        }])->where('req_id', $id)->first();
        $commonId = $id;
        return view('products', compact('products', 'commonId'));
    }

    public function approveReq($id, Request $request)
    {
        $requisitions = Requisitions::where('req_id', $id)->get();
        $form = Form::find($id);
        $form->feedback = 'Approved';
        $form->save();

        foreach ($requisitions as $requisition) {
            $requisition->feedback = 'Approved';
            $requisition->save();
        }

        $from_name = 'hildah';
        $to_name = $form->name;
        $to_email = $form->email;
        $data = array(
            'name' => $to_name,
            "body" => "Response"
        );
        Mail::to($to_email)->send(new ApprovedMail('Approved', ''));

        // Mail::send('emails.gmail2', $data, function ($message) use ($to_name, $to_email, $from_name) {
        //     $message->to($to_email)
        //         ->subject('Requisitions Feedback');
        //     $message->from('mft.portal@gmail.com', $from_name);
        // });



        return redirect()->route('index2')->with('success', 'Requisition Approved.');
        // return redirect()->back()->with('success', 'Approved.');
    }

    public function disapprovalReason($id, Request $request)
    {
        $requisitions = Requisitions::where('req_id', $id)->get();
        $form = Form::find($id);
        $name = $form->name;
        $commonId = $id;
        return view('reason', compact('name', 'commonId'));
    }
    public function disapproveReq(Request $request, $id)
    {
        // return $request->all();
        $requisitions = Requisitions::where('req_id', $id)->get();
        $form = Form::find($id);
        $form->feedback = 'Disapproved';
        $form->save();

        foreach ($requisitions as $requisition) {
            $requisition->feedback = 'Disapproved';
            $requisition->save();
        }
        $from_name = 'MFT';
        $to_name = $form->name;
        $to_email = $form->email;
        $data = array(
            'name' => $to_name,
            "body" => "Response"
        );

        Mail::to($to_email)->send(new ApprovedMail('Rejected', $request->reason));


        // Mail::send('emails.gmail3', $data, function ($message) use ($to_name, $to_email, $from_name) {
        //     $message->to($to_email, $to_name)
        //         ->subject('Requisitions Feedback');
        //     $message->from('mft.portal@gmail.com', $from_name);
        // });


        return redirect()->route('index2')->with('success', 'Requisition Disapproved.');
        // return redirect()->back()->with('success', 'Disapproved.');
    }


    public function approve_1($id)
    {
        $url_1 = env('APP_URL') . '/disapprovalReason/' . $id;
        $url_2 = env('APP_URL') . '/approve_2/' . $id;
        $form = Form::find($id);

        Mail::send(new RequisitionMail2($form, $url_1, $url_2));
        return 'Submited';
    }

    public function approve_2($id)
    {
        $url = env('APP_URL') . '/requisitions/' . $id;
        $form = Form::find($id);

        Mail::send(new RequisitionMail3($form, $url));
        return 'Submited';
    }
    public function approve_3($id)
    {

        $form = Form::find($id);
        Mail::send(new RequisitionMail8($form));
        return 'Submited';
    }

    public function requests($id, Request $request)
    {

        $transport = requests::with(['agents' => function ($query) {
            $query->setEagerLoads([]);
        }])->where('requisition_id', $id)->first();
        $commonId = $id;
        return view('transport', compact('transport', 'commonId'));
    }
}
