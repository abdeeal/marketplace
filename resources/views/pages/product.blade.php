
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
    </div>
<!-- w 2/3  -->
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
<!-- full flex  -->
</div>
<div class="mx-7">
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
      </content>
    <div class="w-full flex">
      <div class="w-2/3 mr-10">
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
      </div>
      <div class="w-1/3">
        <div class="mx-1  border rounded-lg">
          <div class="px-3 py-3">
            <p class=" font-semibold text-xl text-gray-600 block">Masukkan Keranjang</p>
            <div class="mt-2 ml-4 border-b pb-2 flex">
              <img src="{{ asset("img/$p->images") }}" width="70px">
              <span class="text-xs text-gray-500 mt-12 ml-1.5">{{ $p->name }}</span>
            </div>
            <div class="mt-5 flex">
              <div id="border" class="border rounded-md border-gray-300 shadow-sm">
                <button id="minus" onclick="minus()"><img src="{{ asset('items/minus-sign.png') }}" width="10px" class="mx-2 indigo900"></button>
                <input id="basket" onkeyup="keyup()" type="number" class=" text-xs w-14 border-none appearance-none focus:outline-none" value="1"></input>
                <button id="plus" onclick="plus()"><img src="{{ asset('items/plus.png') }}" width="10px" class="mx-2 indigo900"></button>
              </div>
              
              <div class="grid content-center ml-1.5">
                <span class="text-sm font-normal text-gray-600">Stok :</span>
              </div>
              <div class="flex ml-2 float-right">
                <span class="text-indigo-900 font-semibold text-2xl">{{ $p->stock }}</span>
              </div>
            </div>
            <div class="mt-1">
              <span id="spantext" class="text-xs italic text-red-600"></span>
            </div>
            <div class="relative z-0 mt-4">
              <input type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-900 focus:outline-none focus:ring-0 focus:border-0 focus:border-b-2 focus:border-gray-300 peer" placeholder=" " />
                <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-indigo-900 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tambahkan catatan</label>
              </div>
            <div class="flex">
                <div class=" mt-6">
                  <span class="text-gray-600 text-lg font-normal">Subtotal</span>
                </div>
                <div class="">
                   <input type="hidden" value="{{ $p->stock }}" id="stock">
                  <input type="hidden" value="{{ $p->price }}" id="price">
                  <input id="subtotal" type="text" class="w-48 border-none font-semibold text-gray-800 text-2xl text-end mt-3" value="{{ $p->price }}" disabled readonly>
                </div>
              </div>
              <div class="w-full flex">
               <div class="w-1/3 mt-3">
               <form action="" method="GET">
                @csrf
                <div class="border border-gray-900 rounded-lg grid justify-center">
                
                <input type="hidden" id = "basketH" name="basket"></input>
                  <button id="btnbtn" onclick="basketClick()" type="submit" class=" px-3 py-3 -ml-1.5"><img src="{{ asset("items/add-to-cart.svg") }}" width="32px"></button>
                </div>
              </form>
              </div>
              <div class="w-2/3 mt-3">
                <form action="" method="GET">
                  @csrf
                  <div class="border ml-2.5 rounded-lg">
                    <button id="btnbeli" type="submit" class="px-3 py-4 text-center w-full bg-gray-900 text-white rounded-lg">Beli</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full flex mt-4">
      @forelse($random as $rand)
      <div class="w-2/12">
        <div class="border mx-1 px-2 py-2 h-full flex flex-col">
          <div class="">
            <img src="{{ asset("img/$rand->images") }}">
          </div>
          <div class="">
            <span>{{ $rand- }}</span>
          </div>
        </div>
      </div>
      @empty
      
      @endforelse
    </div>
</div>
@empty

@endforelse
@endsection