@extends('layouts.app')

@section('body')
  <div class="container mx-auto py-10">
    <header class="mb-8">
      <h1>Edit a project</h1>
    </header>

    <div class="max-w-sm">
      <form method="POST" action="/projects/{{ $project->id }}" id="edit">
        @csrf
        {{ method_field('PATCH') }}
        
        <label class="flex flex-col mb-4">
          <span class="block mb-2">Project title</span>
          <input class="border-b border-grey pb-2" type="text" name="title" value="{{ $project->title }}">
        </label>

        <label class="flex flex-col mb-4">
          <span class="block mb-2">Project description</span>
          <textarea class="border-b border-grey pb-2" name="description">{{ $project->description }}</textarea>
        </label>
      </form>
      <form method="POST" action="/projects/{{ $project->id }}" id="delete">
        @csrf
        {{ method_field('DELETE') }}
      </form>
      <div class="flex">
        <button type="submit" form="edit" class="bg-orange hover:bg-orange-dark text-white font-bold py-4 px-10 rounded-sm cursor-pointer">Save Changes</button>
        <button type="submit" form="delete" class="inline-block pl-8 no-underline text-grey-dark hover:text-red">Delete</button>
      </div>
    </div>
    


  </div>
@endsection