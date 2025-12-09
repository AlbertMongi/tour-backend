<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Mail\BookingConfirmationMail;
use App\Mail\NewBookingAdminMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Exception;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'country' => 'required|string|max:100',
            'language' => 'nullable|string|max:50',

            'package' => 'required|string|max:255',
            'travelers' => 'required|integer|min:1',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|string|max:100',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'altDates' => 'nullable|string|max:255',

            'accommodation' => 'required|string|in:Budget,Mid-range,Luxury',
            'roomType' => 'required|string|in:Single,Double,Twin,Family Room',
            'diet' => 'required|string',
            'specialRequests' => 'nullable|string',

            'arrivalMethod' => 'required|string|in:Flight,Local Transport',
            'arrivalDateTime' => 'required|date_format:Y-m-d\TH:i',
            'flightNumber' => 'nullable|string|max:50',

            'paymentMethod' => 'required|string',
            'paymentOption' => 'required|string|in:Deposit,Full Amount',

            'emName' => 'required|string|max:255',
            'emRelation' => 'required|string|max:100',
            'emPhone' => 'required|string|max:30',

            'terms' => 'sometimes|accepted',
            'policy' => 'sometimes|accepted',
        ], [
            'endDate.after_or_equal' => 'End date must be same or after the start date.',
            'terms.accepted' => 'You must accept the terms and conditions.',
            'policy.accepted' => 'You must accept the cancellation policy.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fix the errors below',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $booking = Booking::create([
                'full_name'            => $request->fullName,
                'email'                => $request->email,
                'phone'                => $request->phone,
                'country'              => $request->country,
                'language'             => $request->language ?? null,

                'package'              => $request->package,
                'travelers'            => $request->travelers,
                'adults'               => $request->adults,
                'children_ages'        => $request->children,

                'start_date'           => $request->startDate,
                'end_date'             => $request->endDate,
                'alternative_dates'    => $request->altDates,

                'accommodation_level'  => $request->accommodation,
                'room_type'            => $request->roomType,
                'dietary_restrictions' => $request->diet,
                'special_requests'     => $request->specialRequests,

                'arrival_method'       => $request->arrivalMethod,
                'arrival_date_time'    => $request->arrivalDateTime,
                'flight_number'        => $request->flightNumber,

                'payment_method'       => $request->paymentMethod,
                'payment_option'       => $request->paymentOption,

                'emergency_name'       => $request->emName,
                'emergency_relation'   => $request->emRelation,
                'emergency_phone'      => $request->emPhone,
            ]);

            $reference = 'TOUR-' . str_pad($booking->id, 6, '0', STR_PAD_LEFT);
            $booking->update(['reference' => $reference]);

            // SEND EMAILS IMMEDIATELY — NO QUEUE
           // SEND EMAILS IMMEDIATELY
try {
    Mail::to($booking->email)->send(new BookingConfirmationMail($booking, $reference));

    // Optional: Admin copy (simple text version)
    // Mail::raw("New booking received!\n\nReference: {$reference}\nName: {$booking->full_name}\nEmail: {$booking->email}\nPackage: {$booking->package}\nDate: {$booking->start_date}", function ($m) use ($reference) {
    //     $m->to('admin@smjtz.com')
    //       ->subject('NEW BOOKING – ' . $reference);
    // });

} catch (\Exception $e) {
    \Log::error('Email failed: ' . $e->getMessage());
}
            return response()->json([
                'success'   => true,
                'message'   => 'Thank you! Your booking has been received. We will call you within 24 hours.',
                'reference' => $reference
            ], 201);

        } catch (Exception $e) {
            \Log::error('Booking failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Server error. Please try again later.'
            ], 500);
        }
    }
}
