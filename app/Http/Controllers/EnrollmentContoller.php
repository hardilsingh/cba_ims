<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batch;
use App\Course;
use App\Enrollment;
use App\Http\Requests\enrollRequest;
use App\FeeManager;
use Illuminate\Support\Facades\DB;
use App\Enquiry;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentEnrolled;

class EnrollmentContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(enrollRequest $request)
    {
        //
        $input = $request->all();
        $input['reg_no'] = 'CBA/' . time();
        $enroll = Enrollment::create($input);
        $fee_id = FeeManager::create([
            'enrollment_id' => $enroll->id,
            'course_id' => $enroll->course_id,
            'slug' => $enroll->slug,
        ]);
        if ($input['id']) {
            $enrolled = Enquiry::findOrFail($input['id']);
            $enrolled->enrolled = 1;
            $enrolled->save();
        }

        $data = [
            'title'=>'You have successfully been enrolled.',
            'enrollment_id' => $enroll->id,
            'reg_no'=> $input['reg_no'],
        ];

        Mail::send('admin.mail.mail', $data, function ($message) use ($input) {
            $message->to( $input['email'] , $input['name']);
            $message->subject('Enrollment Confirmation');
        });

        $request->session()->flash('student_enrolled', 'Student enrollment complete.');
        return redirect('feemanager/' . $fee_id->slug . '/edit');
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
}
