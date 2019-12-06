<?php

namespace App\Services\Billing;

use App\Mail\InstructorCourseSoldMail;
use App\Models\Course;
use App\Models\Earning;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PaymentService
{
    /**
     * @param array $itemIds
     * @param array $invoice
     */
    public function createEarning(array $itemIds, array $invoice)
    {
        $coursesRaw = DB::table('courses')
            ->whereIn('id', $itemIds)
            ->get();

        $courses = Course::hydrate($coursesRaw->all());

        foreach ($courses as $course)
        {
            $datas = [
                'earningable_id' => $course->id,
                'earningable_type' => 'App\Models\Course',
                'amount' => $invoice['amount_paid'] / 100
                    - ($invoice['amount_paid'] / 100 * getenv('APPLICATION_FEE_GLOBAL_RATE') / 100)
                    - ($invoice['amount_paid'] / 100 * getenv('FEE_STRIPE') / 100)
                    - getenv('FEE_STRIPE_CENT')
                    - ($invoice['amount_paid'] / 100 * getenv('TAX_PERCENT_CA_RATE') / 100) ,
                'paid' => false,
                'seller_id' => $course->user_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];

            $earning = Earning::create($datas);

            Mail::to($course->user->email)->send(new InstructorCourseSoldMail($earning));
        }
    }
}
