@extends('layouts.app')

@section('body')
  <div class="container mx-auto py-10">
    <header class="mb-8">
      <h1>Edit a project</h1>
    </header>

    <div class="max-w-sm">
      <form method="POST" action="/projects/{{ $project->id }}" id="edit">
        @csrf
        @method('PATCH')

        @foreach ($errors->all() as $error)
          <div class="bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Whoops!</strong>
            <span class="block sm:inline">{{ $error }}</span>
          </div>
        @endforeach
        
        <label class="flex flex-col mb-4">
          <span class="block mb-2">Project title</span>
          <input class="border-b {{ $errors->has('title') ? 'border-red' : 'border-grey' }} pb-2" type="text" name="title" value="{{ $project->title }}" required>
        </label>

        <label class="flex flex-col mb-4">
          <span class="block mb-2">Project description</span>
          <textarea class="border-b {{ $errors->has('description') ? 'border-red' : 'border-grey' }} pb-2" name="description" required>{{ $project->description }}</textarea>
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