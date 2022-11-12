<nav class="w-full block bg-gray-800 text-white">
  <div class="flow-root">
    <div class="float-left flex">
      <ul class="py-2 pt-5 pb-5 px-2 pr-5 pl-5">
        <li><a href="{{ route('index')}}" class="text-2xl font-bold tracking-wider">Abdee</a></li>
      </ul>
      <ul class="mt-6 ml-8 hover:underline <?php if($title === "Home"){echo "text-gray-400";} ?>">
        <li><a href="{{ route('index') }}">Home</a></li>
      </ul>
      <ul class="mt-6 ml-4 hover:underline <?php if($title === "Product"){echo "text-gray-400";} ?>">
        <li><a href="{{ route('product') }}">Product</a></li>
      </ul>
    </div>
    <div class="float-right">
      <ul class ="mt-6 mr-10">
        <li><a href="" class="pb-3">LogOut</a></li>
      </ul>
    </div>
  </div>
</nav>