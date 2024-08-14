<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $data = [
            "title" => "Silaturahmi Akbar & Pelantikan",
            "main_image" => "images/pelantikan_2.jpeg",
            "wedding_date" => "2024-09-14 13:00:00",
            "groom_photo" => "https://placehold.co/300?text=Groom+Photo",
            "akad_place_name" => "Graha HMI Cabang Bandung",
            "akad_address" => "Jl.Sabang No.17,Cihapit, Kec.Bandung Wetan, Kota Bandung",
            "akad_maps" => "https://maps.app.goo.gl/K95VR2m3VifEq8SUA",
            "reception_start_date" => "2025-02-26 13:00:00",
            "reception_end_date" => "2025-02-26 15:00:00",
            "reception_place_name" => "Gedung XYZ",
            "reception_address" => "Jl. XYZ 123",
            "reception_maps" => "https://maps.google.com",
            "gift_qr_image" => "https://placehold.co/300?text=QR+Image",
            "gallery" => [
                
                ["link" => "images/3.jpeg"],
                ["link" => "images/4.jpeg"],
                ["link" => "images/5.jpeg"],
                ["link" => "images/6.jpeg"],               
                ["link" => "images/10.jpeg"],               
                ["link" => "images/12.jpeg"],
                ["link" => "images/pelantikan_1.jpeg"],
                ["link" => "images/pelantikan_2.jpeg"],
                ["link" => "images/13.jpeg"],
                ["link" => "images/14.jpeg"],
                ["link" => "images/15.jpeg"],
                ["link" => "images/7.jpeg"],
                ["link" => "images/9.jpeg"],
                ["link" => "images/11.jpeg"],
                ["link" => "images/16.jpeg"],
                ["link" => "images/1.jpeg"],
                ["link" => "images/2.jpeg"],
                ["link" => "images/17.jpeg"]
            ],
            "journey" => [
                [
                    "title" => "Pelantikan dan Silaturahmi Akbar",
                    "story" => "Pelantikan Pengurus masa juang 2024 - 2025 dan Silaturahmi Almuni Komisariat IT Telkom yang dilaksanakan di Graha HMI Cabang Banddung pada Sabtu 14 September 2024",
                    "date" => "2024-09-14 00:00:00"
                ],
                [
                    "title" => "Rapat Kerja",
                    "story" => "Rapat Kerja Pengurus HMI Komisariat IT Telkom masa juang 2024 - 2025 untuk merancang program kerja selama berjalannya kepengurusan Insya Allah akan dilaksanakan pada tanggal 21 - 22 September 2024",
                    "date" => "2024-09-21 00:00:00"
                ],
                [
                    "title" => "Latihan Kader I",
                    "story" => "Latihan Kader I akan dilaksan untuk menjalankan amanat konstitusi dan melanjuutkan perkaderan yang Insya Allah akan dilakasanakan pada 11 - 13 Oktober 2024",
                    "date" => "2024-10-15 00:00:00"
                ],
                [
                    "title" => "Upgrading Pengurus",
                    "story" => "Upgrading Pengurus untuk menambah rasa semangat pengurus dalam menjankan amanah yang Insya Allah akan dilaksanakan pada 26 Oktober 2024",
                    "date" => "2024-10-11 00:00:00"
                ],
                [
                    "title" => "Pengenalan Bidang (Pejuang Muda)",
                    "story" => "Pengenealan bidang - bidang yang ada pada komisariat kepada kader baru sekaligus pendaftaran Pejuang Muda yang Insya Allah Akan Dilaksanakan pada November 2024 ",
                    "date" => "2024-11-21 00:00:00"
                ]
            ]
        ];

        $data["comments"] = Comment::all()->sortByDesc('created_at');
        
        return view('theme', ['data' => (object) $data]);
    }
}
