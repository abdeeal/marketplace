@extends('layouts.master')
@include('partials.navbar')

@section('main')
<div class="mt-7 ml-12">
  <div class="w-full flex">
   <div class="w-1/5 mt-2">
     <span class="uppercase text-xl font-bold text-gray-700 tracking-wide">Data Products</span>
   </div>
   <div class="w-3/5">
       <div class="border w-full rounded-lg">
         <div class="flex justify-center">
           <input type="text" class="w-full px-3 py-2 text-sm rounded-lg"></input>
         </div>
       </div>
   </div>
   <div class="w-1/5">
    <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="ml-4 text-white bg-gray-700 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center shadow-md" type="button">
      @yield('dropdown')
      @empty($idCategories)
      {{ 'Filter' }}
      @endempty
<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
<!-- Dropdown menu -->
      <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 813.091px, 0px);">
    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
      <li>
        <a href="{{ route('product') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All</a>
      </li>
      @foreach($categories as $c)
      <li>
        <a href="{{ route('category', [ 'category' => $c->category, 'id' => $c->id ]) }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ ucfirst($c->category) }}</a>
      </li>
      @endforeach
      
    </ul>
</div>

    </div>
  </div>
</div>
   </div>
  </div>
</div>
<div class="mt-5 ml-12">
  @forelse ($products as $p)
  <?php 
  $name = $p->name; 
  $urlName = str_replace(' ', '-', $name); 
  ?>
  <div class="flex mt-3 mb-10">
    <img src="{{ asset("img/$p->images") }}" class="mr-5" width="250px"></img>
    <div class="mb-2">
    <a href="{{ route('details', ['id' => $p->id, 'name' => $urlName ]) }}"><p class="text-lg font-semibold text-gray-600 hover:text-blue-900">{{ $p->name }}</p>
    <p class="text-sm text-gray-600 font-normal mb-0.5">{{ $p->merk }}</p>
    <p class="text-xs text-gray-500">{{ $p->description }}</p></a>
  </div>
  </div>
  @empty
  <h3 class="font-semibold text-gray-600">Tidak ada data product tersedia.</h3>
  @endforelse
</div>
@endsection