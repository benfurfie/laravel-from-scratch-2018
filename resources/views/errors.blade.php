@foreach ($errors->all() as $error)
  <div class="bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative mb-6" role="alert">
    <strong class="font-bold">Whoops!</strong>
    <span class="block sm:inline">{{ $error }}</span>
  </div>
@endforeach