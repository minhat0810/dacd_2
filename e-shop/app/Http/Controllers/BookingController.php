<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
        ]);

        // Gửi dữ liệu đến Webhook của n8n
        // $response = Http::post('http://your-n8n-server.com/webhook/booking', $data);

        // if ($response->successful()) {
        //     return response()->json(['message' => 'Đặt lịch thành công!']);
        // } else {
        //     return response()->json(['error' => 'Gửi dữ liệu thất bại!'], 500);
        // }
        $filePath = 'bookings.json';

        // Kiểm tra xem file JSON đã tồn tại chưa
        if (Storage::exists($filePath)) {
            $json = Storage::get($filePath);
            $bookings = json_decode($json, true);
        } else {
            $bookings = [];
        }

        // Kiểm tra trùng lịch
        foreach ($bookings as $booking) {
            if (
                $booking['appointment_date'] == $data['appointment_date'] &&
                $booking['appointment_time'] == $data['appointment_time']
            ) {
                return response()->json(['error' => 'Khung giờ này đã được đặt!'], 400);
            }
        }

        // Nếu chưa có, thêm lịch mới vào danh sách
        $bookings[] = $data;
        Storage::put($filePath, json_encode($bookings, JSON_PRETTY_PRINT));

        // Gửi dữ liệu đến Webhook n8n
        $response = Http::post('http://your-n8n-server.com/webhook/booking', $data);

        if ($response->successful()) {
            return response()->json(['message' => 'Đặt lịch thành công!']);
        } else {
            return response()->json(['error' => 'Gửi dữ liệu thất bại!'], 500);
        }
    }
}


?>