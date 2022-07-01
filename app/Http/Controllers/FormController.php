<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FieldRequest;
use App\Models\Form;
use Carbon\Carbon;

class FormController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create()
    {
        return view('create');
    }

    public function store(FieldRequest $request)
    {
        $member = new Form;
        $member->name = $request->name;
        $member->surname = $request->surname;
        $member->id_number = $request->id_number;
        // $member->date_of_birth = Carbon::createFromFormat('m-d-Y', $request->date_of_birth)->format('Y-m-d');
        $member->date_of_birth = date("Y-m-d", strtotime($request->date_of_birth));
        // $member->date_of_birth = FormController::getIdNumberDate($request->id_number)->format('Y-m-d');
        // $memberDate = $member->date_of_birth;
        $idNumberDate = FormController::getIdNumberDate($request->id_number);
        $dateValidation = FormController::validateDate($idNumberDate, $member->date_of_birth);
        if ($dateValidation == 0) {
            return redirect(url()->previous())
                ->withInput($request->input())
                ->withErrors('Please make sure that your date of birth matches the one on your ID number');
        }

        try {
            $member->save();
            // return response()->json('Form is successfully validated and data has been saved');
            return view('success');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1062') {
                return redirect(url()->previous())
                    ->withInput($request->input())
                    ->withErrors('ID number already exists, please try again with a different one');
            } else {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function cancel()
    {
        return redirect('index');
    }

    public function success()
    {
        return view('success');
    }

    public function getIdNumberDate($identity)
    {
        $date = substr($identity, 0, 6);

        $date = \DateTime::createFromFormat('ymd', $date);
        $now  = new \DateTime();

        // compare birth date with current date: 
        // if it's bigger bd was in previous century
        if ($date > $now) {
            $date->modify('-100 years');
        }

        return $date->format('Y-m-d');
    }

    public function validateDate($idDate, $dobDate)
    {
        if ($idDate != $dobDate) {
            return 0;
        } else
            return 1;
    }
}
