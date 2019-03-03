@extends('layouts.app')

@section('body')
  <div class="container mx-auto py-10">
    <header class="mb-8">
      <h1>Create a project</h1>
    </header>

    <form method="POST" action="/projects" class="max-w-sm">
      @csrf
      
      <label class="flex flex-col mb-4">
        <span class="block mb-2">Project title</span>
        <input class="border-b border-grey pb-2" type="text" name="title">
      </label>

      <label class="flex flex-col mb-4">
        <span class="block mb-2">Project description</span>
        <textarea class="border-b border-grey pb-2" name="description"></textarea>
      </label>

      <button class="bg-orange hover:bg-orange-dark text-white font-bold py-4 px-10 rounded-sm cursor-pointer">Create</button>
    </form>
  </div>
@endsection