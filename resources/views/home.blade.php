<x-layout>
  
  <div class="relative isolate px-6 lg:px-8">
    <!-- Background Blur Shapes -->
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
      <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
  
    <div class="mx-auto py-32 sm:py-48 lg:py-56 flex items-center justify-between">
      <div class="flex-1" data-aos="fade-right" data-aos-duration="1500">
        <h1 class="text-balance text-4xl font-bold tracking-tight text-gray-200 sm:text-6xl">Ayo Main Futsal</h1>
        <p class="mt-6 text-lg leading-8 text-gray-200">Pilih Lapangan, Atur Jadwal, dan Mulai Pertandingan!</p>
        <div class="mt-10 flex items-center gap-x-6">
          <button class="relative w-auto h-auto p-3 bg-black text-white border-none rounded-md text-xl font-bold cursor-pointer group overflow-hidden">
           <a href="/booking">
             Booking Sekarang
             <span class="absolute inset-0 w-full h-full bg-white transform scale-0 group-hover:scale-100 transition-transform duration-500 origin-left"></span>
             <span class="absolute inset-0 w-full h-full bg-purple-400 transform scale-0 group-hover:scale-100 transition-transform duration-700 origin-left"></span>
             <span class="absolute inset-0 w-full h-full bg-purple-600 transform scale-0 group-hover:scale-100 transition-transform duration-1000 origin-left"></span>
             <span class="absolute top-3 left-3 z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-1000">Booking Sekarang</span>
            </a>
         
        </div>
      </div>

      <div class="hidden lg:block flex-1">
        <img src="{{ asset('img/futsal.jpg') }}" alt="Futsal" class="w-full h-auto object-cover"  data-aos="fade-left" data-aos-duration="1500"">
      </div>
    </div>
  
  </div>
  <div>
    <h2 class="text-3xl text-center font-semibold text-gray-300 mb-8">Manfaat Futsal</h2>

    <!-- Ubah flex ke grid dan atur kolom untuk mobile dan desktop -->
    <div class="grid grid-cols-1 sm:grid-cols-5 gap-4 justify-items-center mx-5">
      <div class="w-64 bg-white shadow-[0px_0px_15px_rgba(0,0,0,0.09)] p-9 space-y-3 relative overflow-hidden a" data-aos="flip-left" data-aos-duration="1000">
        <div class="w-24 h-24 bg-violet-500 rounded-full absolute -right-5 -top-7">
          <p class="absolute bottom-6 left-7 text-white text-2xl">01</p>
        </div>
        <div class="fill-violet-500 w-12">
          <img width="50" height="50" src="https://img.icons8.com/ios/50/heart-with-pulse--v1.png" alt="heart-with-pulse--v1"/>
        </div>
        <h1 class="font-bold text-xl text-violet-500">Menyehatkan Jantung</h1>
        <p class="text-sm text-zinc-500 leading-6">
          Olahraga intens yang baik untuk Jantung
        </p>
      </div>

      <div class="w-64 bg-white shadow-[0px_0px_15px_rgba(0,0,0,0.09)] p-9 space-y-3 relative overflow-hidden" data-aos="flip-left" data-aos-duration="1000" data-aos-delay ="500">
        <div class="w-24 h-24 bg-violet-500 rounded-full absolute -right-5 -top-7">
          <p class="absolute bottom-6 left-7 text-white text-2xl">02</p>
        </div>
        <div class="fill-violet-500 w-12">
          <img width="50" height="50" src="https://img.icons8.com/ios/50/friends.png" alt="friends"/>
        </div>
        <h1 class="font-bold text-xl text-violet-500">Meningkatkan Koordinasi</h1>
        <p class="text-sm text-zinc-500 leading-6">
          Gerakan cepat melatih keseimbangan dan koordinasi
        </p>
      </div>

      <div class="w-64 bg-white shadow-[0px_0px_15px_rgba(0,0,0,0.09)] p-9 space-y-3 relative overflow-hidden" data-aos="flip-left" data-aos-duration="1000" data-aos-delay ="1250">
        <div class="w-24 h-24 bg-violet-500 rounded-full absolute -right-5 -top-7">
          <p class="absolute bottom-6 left-7 text-white text-2xl">03</p>
        </div>
        <div class="fill-violet-500 w-12">
          <img width="50" height="50" src="https://img.icons8.com/ios/50/sad.png" alt="sad"/>
        </div>
        <h1 class="font-bold text-xl text-violet-500">Menghilangkan Galau</h1>
        <p class="text-sm text-zinc-500 leading-6">
          Fokus ngebobol gawang lawan bikin lupa mantan
        </p>
      </div>

      <div class="w-64 bg-white shadow-[0px_0px_15px_rgba(0,0,0,0.09)] p-9 space-y-3 relative overflow-hidden" data-aos="flip-left" data-aos-duration="1000" data-aos-delay ="2250">
        <div class="w-24 h-24 bg-violet-500 rounded-full absolute -right-5 -top-7">
          <p class="absolute bottom-6 left-7 text-white text-2xl">04</p>
        </div>
        <div class="fill-violet-500 w-12">
          <img width="50" height="50" src="https://img.icons8.com/ios/50/goodnotes.png" alt="goodnotes"/>
        </div>
        <h1 class="font-bold text-xl text-violet-500">Menunda Deadline</h1>
        <p class="text-sm text-zinc-500 leading-6">
          Alasan sehat buat ngulur tugas
        </p>
      </div>

      <div class="w-64 bg-white shadow-[0px_0px_15px_rgba(0,0,0,0.09)] p-9 space-y-3 relative overflow-hidden" data-aos="flip-left" data-aos-duration="1000" data-aos-delay ="3000">
        <div class="w-24 h-24 bg-violet-500 rounded-full absolute -right-5 -top-7">
          <p class="absolute bottom-6 left-7 text-white text-2xl">05</p>
        </div>
        <div class="fill-violet-500 w-12">
          <img width="50" height="50" src="https://img.icons8.com/ios/50/trust--v1.png" alt="trust--v1"/>
        </div>
        <h1 class="font-bold text-xl text-violet-500">Cari Gebetan</h1>
        <p class="text-sm text-zinc-500 leading-6">
          Pamer skill, siapa tau ada yang tertarik
        </p>
      </div>
    </div>

    <div class="mb-36">
      <h2 class="text-3xl text-center font-semibold text-gray-300 mb-8 mt-36">FAQ</h2>
      <div class="mx-24">
        <div class="accordion-group">
          @foreach ($faq as  $f)
          <div class="accordion">
            <input type="checkbox" id="accordion-{{ $f->id }}" class="accordion-toggle" />
            <label for="accordion-{{ $f->id }}" class="accordion-title">{{ $f->pertanyaan }}</label>
            <span class="accordion-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
            </span>
            <div class="accordion-content">
              <div class="min-h-0">{{ $f->jawaban }}
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
</div>

</div>

</x-layout>