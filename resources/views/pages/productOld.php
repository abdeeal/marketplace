@extends('layouts.master')
@include('partials.navbar')

@section('main')
@forelse ($product as $p)
<div class="w-full flex">
  <div class="w-2/3">
    <div class="mt-7 mx-12">
      <h1 class="text-4xl font-bold tracking-wider text-gray-600">Beli {{ $p->name }}</h1>
      <div class="mt-7">
        <img src="{{ asset("img/$p->images") }}" width="560px"></img>
      </div>
      <div class="w-full flex">
        <div class="w-1/2 mt-10">
          <span class="text-4xl font-medium tracking-wide text-gray-700 block">{{$p->name}}</span>
          
          <div class="mt-3">
            <div class="flex">
              <span class="text-lg">{{ $p->merk }}</span>
              <img src="{{ asset('items/verified.svg') }}" width="15px" class="ml-0.5"></img>
            </div>
          </div>
          <div class="mt-3">
            <div class="flex">
              <span class="py-1.5 px-1.5 text-white bg-gray-800 rounded-lg text-xs mx-1 -ml-1 shadow-md"><?php 
                 if($p->categories === "buku"){
                   echo "Trusted authors";
                   }else{
                   echo "Trusted developers";
                   }?></span>
              <span class="bg-gray-800 rounded-lg text-xs text-white py-1.5 px-1.5 mx-1 shadow-md">
               @forelse($join as $j)
               {{ ucfirst($j->category) }}
               @empty
               Category
               @endforelse
              </span>
            </div>
          </div>
        </div>
        <div class="w-1/2 mt-7">
          <span class="text-2xl font-semibold text-gray-600 border-2 border-gray-600 rounded-md py-3 px-3 float-right shadow-md">Rp{{ number_format($p->price) }}</span>
        </div>
      </div>
      <div class="my-5">
        <hr>
      </div>
      <content>
        <div class="w-full border-slate-200 rounded-xl ">
          <div class="flex justify-center">
            <span class="text-9xl font-bold italic text-gray-700">{{ $p->rating }}</span>
          </div>
          <p class="text-2xl text-center text-gray-500 font-bold italic">Out of 5</p>
        </div>
        <div class="my-5">
          <hr class="border-1.5 rounded-xl">
        </div>
        <div class="">
          <span class="text-2xl font-semibold text-gray-600 block mb-4">Rincian Produk</span>
          <div class="flow-root mb-2">
            <label class="float-left text-sm text-gray-500">Name</label>
            <span class="float-right text-sm font-medium text-gray-600">{{ $p->name }}</span>
          </div>
          <div class="flow-root mb-2">
            <label class="float-left text-sm text-gray-500">Merk</label>
            <span class="float-right text-sm font-medium text-gray-600">{{ $p->merk }}</span>
          </div>
          <div class="flow-root mb-2">
            <label class="float-left text-sm text-gray-500">From</label>
            <span class="float-right text-sm font-medium text-gray-600">{{ $p->from }}</span>
          </div>
          <div class="flow-root mb-2">
            <label class="float-left text-sm text-gray-500">Rating</label>
            <span class="float-right text-sm font-medium text-gray-600">{{ $p->rating }}</span>
          </div>
          <div class="flow-root mb-2">
            <label class="float-left text-sm text-gray-500">Price</label>
            <span class="float-right text-sm font-medium text-gray-600">{{ number_format($p->price) }}</span>
          </div>
        </div>
        <div class="border-y mt-6 py-2 px-2 -mx-2">
          <p class="text-sm text-gray-500">{{ $p->description }}</p>
        </div>
        <div>
          <div class="mb-4">
            <p class="text-2xl font-semibold text-gray-600 mt-4">Reviews</p>
            <div class="">
              <span class="text-gray-500 text-xs ml-0.5 mb-1">{{ $p->rating }}</span><span class="text-gray-500 text-xs">
                @if($p->sold > 1000)
                <?php 
                $s = $p->sold / 1000;
                $sold = intval($s). "RB+ terjual";
                ?>
                @elseif($p->sold > 1000000)
                <?php
                $s = $p->sold / 1000000;
                $sold = intval($s). "JT+ terjual";
                ?>
                @else
                <?php 
                $sold = $p->sold . " terjual";
                ?>
                @endif
                ( {{ $sold }} )
              </span>
              <?php $star = intval($p->rating) ?>
              @for ($i = 0; $i < $star; $i++)
              <img src='{{ asset('items/star.png') }}' class='float-left mt-0.5' width='10px'></img>
              @endfor
            </div>
          </div>
          <div class="border rounded-md">
<!--Reviews and Ratings-->
            @forelse ($review as $r)
            
            @empty
            <p class="text-sm font-medium text-gray-600 block mb-4 mt-4 mx-5">Belum ada ulasan untuk produk ini.</p>
            @endforelse
          </div>
        </div>
        <div class="w-full flex mt-7">
          <div class="w-1/3 mr-2">
            <a href=""><button class="w-full border-2 flex justify-center py-3 border-gray-800 rounded-xl shadow-md">
              <img src="{{ asset('items/add-to-cart.svg') }}" width="30px" class="" alt="Masukkan Keranjang"></img></a>
            </button>
          </div>
          <div class="w-2/3 w-full flex justify-center">
            <a href="" class="w-full"><button class="text-white bg-gray-800 w-full px-3 py-4 rounded-xl shadow-lg tracking-wider font-medium pl-2">Beli Sekarang</button></a>
          </div>
        </div>
      </content>
    </div>
  </div>
  <div class="w-1/3">
    <div class="mt-7 mx-12">
      <div class="flex justify-end mb-5">
        <h1 class="text-2xl font-bold text-gray-700 tracking-wider">Gambar</h1>
      </div>
    </div>
   <!-- Fotos  -->
   @empty($p->childImg)
   <div class="w-full">
     <div class="mr-6 grid content-center border-2 rounded-xl border-gray-100" style="height: 740px;">
       <p class="font-semibold text-lg text-gray-500 px-3 text-center">Tidak ada gambar tambahan untuk produk ini.</p>
     </div>
   </div>
   @endempty
   <p></p>
   <div class=" w-full">
     @isset($p->childImg)
     <div class="mr-6 border-2 mb-4 border-gray-300 rounded-xl">
       <img src="{{ asset("img/child/$p->childImg") }}" width="500px" class="py-4">
     </div>
     @endisset
     
     @isset($p->childImg2)
     <div class="mr-6 my-1 border-2 border-gray-300 rounded-xl">
       <img src="{{ asset("img/child/$p->id-child-b.jpg") }}" width="500px" class="py-4">
     </div>
     @endisset
   </div>
  </div>
</div>
@empty
<div class="mt-7 ml-12">
<h3 class="font-semibold text-gray-600">Terjadi kesalahan.</h3>
</div>
@endforelse

@endsection