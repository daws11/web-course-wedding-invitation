<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>{{ $data->title }}</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
  </head>

  <body class="font-montserrat w-full h-auto min-h-screen flex flex-col">
  <audio id="background-audio" autoplay loop>
        <source src="{{ asset('audio/hymne.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <!-- Main Section -->
    <section class="w-full h-screen flex flex-col items-center justify-center text-white bg-fixed bg-cover bg-no-repeat bg-center" style="background-image: url('{{ $data->main_image }}');">
      <div class="bg-black bg-opacity-50 w-full h-screen absolute"></div>

      <div class="z-10 flex flex-col items-center text-center px-4 sm:px-8 md:px-16"
        data-aos="fade-in" 
        data-aos-duration="1200"  
        data-aos-easing="ease-in-out" 
        data-aos-delay="200" 
        data-aos-offset="200">
        <span class="font-berkshire mt-5 text-4xl sm:text-5xl md:text-6xl lg:text-7xl">Silaturahmi Akbar & Pelantikan Pengurus</span>
        <span class="uppercase font-extralight text-lg sm:text-xl md:text-2xl lg:text-3xl">HMI Komisariat IT Telkom Masa Juang 2024-2025</span>
        <span class="font-extralight text-lg sm:text-xl md:text-2xl mt-5">{{ formatDate($data->wedding_date, 'l, F jS Y') }}</span>
      </div>
    </section>
    <!-- ./Main Section -->


    <!-- Profile Section -->
    <section 
    data-aos="fade-up" 
    data-aos-duration="1200"  
    data-aos-easing="ease-in-out" 
    data-aos-delay="200" 
    data-aos-offset="200"
    class="w-full h-auto bg-white flex flex-col items-center p-6 sm:p-10 md:p-16 bg-fixed bg-cover bg-no-repeat bg-center" 
    style="background-image: url({{ asset('images/theme_01_bg_profile.webp') }})">
      
      <img src="{{ asset('images/bismillah.webp') }}" alt='Bismillah' class="w-1/2 sm:w-1/3 md:w-1/4 mt-5" />
      
      <span class="font-light text-lg sm:text-xl mt-8 text-center">Assalamu'alaikum Warrahmatullahi Wabarakatuh</span>
      <span class="font-light text-lg sm:text-xl mt-4 text-center">Dengan Hormat Kami Mengundang Kanda/Yunda:</span>

      <!-- Profile -->
      @if($guest)
          <span class="font-bold font-berkshire text-4xl sm:text-5xl md:text-6xl mt-8 text-center">{{ $guest->name }}</span>
      @else
          <span class="font-bold font-berkshire text-4xl sm:text-5xl md:text-6xl mt-8 text-center">Senior HMI IT Telkom</span>
      @endif
      
      <span class="font-light text-md sm:text-lg mt-10 text-center">Untuk menghadiri acara</span>
      <span class="font-bold text-xl sm:text-2xl mt-1 text-center">Pelantikan Pegurus</span>
      <span class="font-light text-md sm:text-lg mt-1 text-center">&</span>
      <span class="font-bold text-xl sm:text-2xl mt-1 text-center">Silaturahmi Akbar</span>
      <span class="font-light text-md sm:text-lg mt-1 text-center">HMI Komisariat IT Telkom Masa juang 2024 - 2025</span>
      <!--  Profile -->

    </section>
    <!-- ./Profile Section -->


    <!-- Wedding Information Section -->
    <section class="w-full h-auto min-h-screen flex flex-col px-6 sm:px-10 py-20 bg-fixed bg-cover bg-no-repeat bg-center items-center" style="background-image: url({{ asset('images/graha.jpeg') }})">
      <div class="w-full sm:w-3/4 lg:w-2/3 h-auto bg-white flex flex-col rounded-[50px] sm:rounded-[80px] lg:rounded-[100px] overflow-hidden">
        <!-- Countdown -->
        <div class="flex flex-col h-72 sm:h-80 md:h-96 relative bg-cover bg-no-repeat" style="background-image: url('{{ $data->main_image }}');">
          <div class="bg-black bg-opacity-75 w-full h-full absolute z-0"></div>

          <div 
          data-aos="fade-up" 
          data-aos-duration="1200"  
          data-aos-easing="ease-in-out" 
          data-aos-delay="200" 
          data-aos-offset="200"
          class="flex flex-col w-full h-full text-white z-20 items-center justify-center gap-6 sm:gap-8">
            <span class="font-bold text-4xl sm:text-5xl md:text-6xl lg:text-7xl">Countdown</span>
            <span class="font-bold text-3xl sm:text-4xl md:text-5xl lg:text-6xl">{{ countdown($data->wedding_date) }} days</span>
          </div>
        </div>
        <!-- ./Countdown -->

        <!-- Akad -->
        <div 
          data-aos="fade-up" 
          data-aos-duration="1200"  
          data-aos-easing="ease-in-out" 
          data-aos-delay="200" 
          data-aos-offset="200"
        class="flex flex-col py-16 sm:py-20 items-center text-center">
          <span class="font-extralight text-2xl sm:text-3xl md:text-4xl">Waktu & Tempat Pelaksanaan</span>
          <span class="font-medium text-2xl sm:text-3xl md:text-4xl mt-4">Sabtu, 14 September 2024</span>
          <span class="font-medium text-2xl sm:text-3xl md:text-4xl mt-4">13.00 WIB - Selesai</span>
          <span class="font-light text-lg sm:text-xl mt-4">{{ $data->akad_place_name }}</span>
          <span class="font-light text-lg sm:text-xl mt-4">{{ $data->akad_address }}</span>
          <a href="{{ $data->akad_maps }}" target="_blank" class="font-light text-md sm:text-lg mt-4 bg-slate-500 rounded-md text-white px-3 py-1 hover:scale-110 duration-300">See Location</a>
        </div>
        <!-- ./Akad -->
      </div>
    </section>
    <!-- ./Wedding Information Section -->


    <!-- Journey Section -->
    @if(count($data->journey) > 0)
    <section class="w-full h-auto min-h-screen flex flex-col px-6 sm:px-10 py-20 bg-fixed bg-cover bg-no-repeat bg-center items-center" style="background-image: url({{ asset('images/theme_01_bg_profile.webp') }})">
      <span 
          data-aos="fade-up" 
          data-aos-duration="1200"  
          data-aos-easing="ease-in-out" 
          data-aos-delay="200" 
          data-aos-offset="200"
      class="font-berkshire text-4xl sm:text-5xl md:text-6xl text-center">Rencana Perjalanan Kami</span>
      
      <div class="flex flex-col px-4 sm:px-10 mt-10 items-center w-full font-light">
        <div class="w-5 h-5 rounded-full bg-slate-500 hidden sm:block"></div>
        <div class="w-1 h-10 bg-slate-500 hidden sm:block"></div>

        @foreach($data->journey as $key => $item)
          <div class="flex flex-row w-full justify-center">
            @if($key % 2 == 0)
              <div 
              data-aos="fade-right" 
              data-aos-duration="1200"  
              data-aos-easing="ease-in-out" 
              data-aos-delay="200" 
              data-aos-offset="200"
              class="w-2/3 sm:w-1/2 md:w-1/3 text-end text-sm sm:text-lg md:text-xl font-medium mb-5 sm:mb-0">
                {{ formatDate($item['date'], 'M Y') }}
              </div>
              
              <div class="w-1 min-w-1 h-auto bg-slate-500 mx-3 sm:mx-5 hidden sm:block"></div>
              
              <div 
              data-aos="fade-left" 
              data-aos-duration="1200"  
              data-aos-easing="ease-in-out" 
              data-aos-delay="200" 
              data-aos-offset="200"
              class="w-2/3 sm:w-1/2 md:w-1/3 h-fit text-sm sm:text-lg md:text-xl bg-white flex flex-col rounded-md p-5 mb-10 -mt-2">
                <span class="font-medium mb-3">{{ $item['title'] }}</span>
                <span>{{ $item['story'] }}</span>
              </div>
            @else
              <div 
              data-aos="fade-right" 
              data-aos-duration="1200"  
              data-aos-easing="ease-in-out" 
              data-aos-delay="200" 
              data-aos-offset="200"
              class="w-2/3 sm:w-1/2 md:w-1/3 h-fit text-sm sm:text-lg md:text-xl bg-white flex flex-col rounded-md p-5 mb-10 -mt-2">
                <span class="font-medium mb-3">{{ $item['title'] }}</span>
                <span>{{ $item['story'] }}</span>
              </div>
              
              <div class="w-1 min-w-1 h-auto bg-slate-500 mx-3 sm:mx-5 hidden sm:block"></div>

              <div 
              data-aos="fade-left" 
              data-aos-duration="1200"  
              data-aos-easing="ease-in-out" 
              data-aos-delay="200" 
              data-aos-offset="200"
              class="w-2/3 sm:w-1/2 md:w-1/3 text-sm sm:text-lg md:text-xl font-medium mb-5 sm:mb-0">
                {{ formatDate($item['date'], 'M Y') }}
              </div>
            @endif
          </div>
        @endforeach
        
        <div class="w-5 h-5 rounded-full bg-slate-500 hidden sm:block"></div>
      </div>
    </section>
    @endif
    <!-- ./Journey Section -->



    <!-- Gallery Section -->
    @if(count($data->gallery) > 0)
    <section class="w-full h-auto min-h-screen flex flex-col px-6 sm:px-10 py-20 bg-fixed bg-cover bg-no-repeat bg-center items-center" style="background-image: url({{ asset('images/theme_01_bg_profile.webp') }}');">
        <span 
        data-aos="fade-down" 
                data-aos-duration="1200"  
                data-aos-easing="ease-in-out" 
                data-aos-delay="200" 
                data-aos-offset="200"
        class="font-berkshire text-4xl sm:text-5xl md:text-6xl text-center">Galery Komisariat</span>
        
        <div class="grid h-auto gap-5 px-4 sm:px-10 mt-10 w-full grid-cols-2 md:grid-cols-3">
            @foreach($data->gallery as $item)
                <div class="w-full h-48 group overflow-hidden relative">
                    <img src="{{ $item['link'] }}" alt="Gallery Item" 
                         class="group-hover:scale-110 duration-300 w-full h-full object-cover cursor-pointer" 
                         data-aos="fade-down" 
                         data-aos-duration="1200"  
                         data-aos-easing="ease-in-out" 
                         data-aos-delay="200" 
                         data-aos-offset="200"
                    />
                </div>
            @endforeach
        </div>
    </section>
    @endif
    <!-- ./Gallery Section -->


    <!-- Doa Section -->
    <section 
    data-aos="fade-in" 
              data-aos-duration="1200"  
              data-aos-easing="ease-in-out" 
              data-aos-delay="200" 
              data-aos-offset="200"
    class="w-full h-screen bg-white flex flex-col items-center bg-fixed bg-cover bg-no-repeat bg-center" style="background-image: url({{ asset('images/theme_01_bg_doa.webp') }})">
      <div class="bg-white bg-opacity-90 w-full h-screen absolute">
      </div>  
      
      <div 
      data-aos="fade-down" 
              data-aos-duration="1200"  
              data-aos-easing="ease-in-out" 
              data-aos-delay="200" 
              data-aos-offset="200"
      class="z-10 flex flex-col w-2/3 h-full items-center justify-center">
        <img src="{{ asset('images/quran.jpg') }}" alt='Doa' class="w-fit" />

        <span class="text-xl font-light text-center italic tracking-wider mt-5">innallâha ya’murukum an tu’addul-amânâti ilâ ahlihâ wa idzâ ḫakamtum bainan-nâsi an taḫkumû bil-‘adl, innallâha ni‘immâ ya‘idhukum bih, innallâha kâna samî‘am bashîrâ</span>
        <span class="text-xl font-light text-center tracking-wider mt-5">Sesungguhnya Allah menyuruh kamu menyampaikan amanah kepada pemiliknya. Apabila kamu menetapkan hukum di antara manusia, hendaklah kamu tetapkan secara adil. Sesungguhnya Allah memberi pengajaran yang paling baik kepadamu. Sesungguhnya Allah Maha Mendengar lagi Maha Melihat.</span>
        <span class="text-xl font-light text-center tracking-wider">(QS. An-Nisa Ayat 58)</span>
      </div>
      
    </section>
    <!-- ./Doa Section -->



    <!-- Comment Section -->
    <section class="w-full h-auto min-h-screen flex flex-col items-center px-4 sm:px-10 py-20 text-black bg-fixed bg-cover bg-no-repeat bg-center font-light" style="background-image: url('{{ asset('images/theme_01_bg_comments.webp') }}');">

    <!-- QR Image -->
    <div class="flex flex-col py-10 sm:py-20 px-6 sm:px-28 items-center text-center"
    data-aos="fade-down" 
          data-aos-duration="1200"  
          data-aos-easing="ease-in-out" 
          data-aos-delay="200" 
          data-aos-offset="200"
    >
      <span class="font-light text-lg sm:text-xl md:text-2xl mt-5">Demi kelancaran acara ini, kami mohon kesediaan kanda/yunda untuk memberikan kontribusi sebesar min. Rp50.000,- sebagai biaya yang nantinya akan di alokasikan untuk kelancaran acara Silaturahmi Akbar dan Pelantikan</span>
      <span class="font-medium text-lg sm:text-xl md:text-2xl mt-10">Bank Mandiri 1570011595841 a/n MUHAMAD OMAR DHANI</span>
    <a href="https://drive.google.com/file/d/1jO1wdXpiSSObENbsMI-9mGgDWhnzDvGN/view?usp=sharing" target="_blank">
      <button type="button" class="mt-10 bg-develobe-500 w-fit mx-auto px-5 py-3 rounded-md text-white font-normal hover:scale-110 duration-300 drop-shadow-md">
          Lihat Proposal
      </button>
    </a>
    </div>

    <!-- ./QR Image -->
    <span class="text-lg sm:text-xl md:text-2xl text-center">Konfirmasi Kehadiran</span>

    <form action="/send-comment" method="POST" enctype="multipart/form-data" class="flex flex-col w-full sm:w-3/4 md:w-1/2 mt-10 px-4 sm:px-0">
    @csrf
    <label for="name" class="text-lg sm:text-xl">Nama</label>
    <input id="name" name="name" type="text" maxlength="50" placeholder="Nama Tamu" class="p-3 outline-none rounded-md mt-2 drop-shadow-md" value="{{ $guest->name ?? '' }}" {{ $guest ? 'readonly' : '' }} required/>

    <label for="whatsapp" class="text-lg sm:text-xl mt-5">Nomor Whatsapp</label>
    <input id="whatsapp" name="whatsapp" type="text" maxlength="50" placeholder="Nomor whatsapp yang bisa dihubungi" class="p-3 outline-none rounded-md mt-2 drop-shadow-md" required/>

    <label for="bukti_transfer" class="text-lg sm:text-xl mt-5">Bukti Transfer</label>
    <input id="bukti_transfer" name="bukti_transfer" type="file" accept="image/*" class="p-3 outline-none rounded-md mt-2 drop-shadow-md">

    <label for="angkatan" class="text-lg sm:text-xl mt-5">Angkatan</label>
    <input id="angkatan" name="angkatan" type="text" maxlength="50" placeholder="Tahun angkatan kanda/yunda semasa kuliah" class="p-3 outline-none rounded-md mt-2 drop-shadow-md" required/>

    <label for="jurusan" class="text-lg sm:text-xl mt-5">Jurusan</label>
    <input id="jurusan" name="jurusan" type="text" maxlength="50" placeholder="Jurusan kanda/yunda selama kuliah" class="p-3 outline-none rounded-md mt-2 drop-shadow-md" required/>

    <label for="kota_domisili" class="text-lg sm:text-xl mt-5">Kota Domisili</label>
    <input id="kota_domisili" name="kota_domisili" type="text" maxlength="50" placeholder="Kota domisili kanda/yunda saat ini" class="p-3 outline-none rounded-md mt-2 drop-shadow-md" required/>

    <label for="comment" class="text-lg sm:text-xl mt-5">Pesan dan Kesan</label>
    <textarea id="comment" name="comment" rows="5" maxlength="500" class="p-3 outline-none rounded-md mt-2 resize-none drop-shadow-md" placeholder="Pesan Anda" required></textarea>

    <button type="submit" class="mt-10 bg-develobe-500 w-fit mx-auto px-5 py-3 rounded-md text-white font-normal hover:scale-110 duration-300 drop-shadow-md">Kirim Ucapan</button>
    </form>

    <div class="flex flex-col w-full sm:w-3/4 md:w-1/2 mt-10 gap-5 px-4 sm:px-0">
    @foreach($data->comments as $item)
        <div class="flex flex-col w-full bg-white rounded-md drop-shadow-md p-3">
            <span class="font-medium">{{ $item['name'] }} | {{ $item['angkatan'] }} | {{ $item['jurusan'] }}</span>
            <span class="font-light">{{ $item['comment'] }}</span>
        </div>
    @endforeach
    </div>

    </section>
    <!-- ./Comment Section -->


    <!-- Footer Section -->
    <div class="w-full flex flex-col items-center font-poppins p-5">
      <span>
        Made by <a href="https://vello.tech/" target="_blank" class="text-develobe-500">Vello Tech</a>
      </span>
    </div>
    <!-- ./Footer Section -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    
  </body>
</html>