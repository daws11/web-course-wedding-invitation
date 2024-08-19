<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrmawaGuest;
use App\Models\OrmawaComment;

class OrmawaController extends Controller
{
    public function index($slug = null)
    {
        $data = [
            "title" => "Silaturahmi Akbar & Pelantikan",
            "main_image" => url('images/pelantikan_2.jpeg'),
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
                ["link" => url('images/3.jpeg')],
                ["link" => url('images/4.jpeg')],
                ["link" => url('images/5.jpeg')],
                ["link" => url('images/6.jpeg')],
                ["link" => url('images/10.jpeg')],
                ["link" => url('images/12.jpeg')],
                ["link" => url('images/pelantikan_1.jpeg')],
                ["link" => url('images/pelantikan_2.jpeg')],
                ["link" => url('images/13.jpeg')],
                ["link" => url('images/14.jpeg')],
                ["link" => url('images/15.jpeg')],
                ["link" => url('images/7.jpeg')],
                ["link" => url('images/9.jpeg')],
                ["link" => url('images/11.jpeg')],
                ["link" => url('images/16.jpeg')],
                ["link" => url('images/1.jpeg')],
                ["link" => url('images/2.jpeg')],
                ["link" => url('images/17.jpeg')]
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

        $guest = null;
        if ($slug) {
            // Change 'name' to 'slug' to search for the slug in the correct column
            $guest = OrmawaGuest::where('slug', $slug)->firstOrFail();
    
            if (is_null($guest->name) || trim($guest->name) === '') {
                $guest->name = 'Ormawa Guest';
            }
    
            $data['guest'] = $guest;
        }
    
        return view('ormawa.guest', ['data' => (object)$data, 'guest' => $guest]);
    }

    

}
