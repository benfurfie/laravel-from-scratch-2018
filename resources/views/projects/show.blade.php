@extends('layouts.app')

@section('body')
  <div class="container mx-auto py-10">
    <header class="mb-8 border-b pb-2 mb-6">
      <h1>{{ $project->title }}</h1>
    </header>
    <div class="mb-10">
      <p>{{ $project->description }}</p>
      @if($project->tasks->count())
        <hr class="border-b mt-10 mb-4">
        <ul class="list-reset max-w-sm">
          @foreach ($project->tasks as $task)
            <li class="leading-loose">
              <form action="/tasks/{{ $task->id }}" method="POST">
                @csrf
                @method('PATCH')
                <label class="flex items-center cursor-pointer" for="completed-{{ $task->id }}">
                  <input type="checkbox" name="completed" id="completed-{{ $task->id }}" onChange="this.form.submit() " {{ $task->completed ? 'checked' : '' }}>
                  <span class="ml-2{{ $task->completed ? ' line-through' : '' }}">{{ $task->description }}</span>
                </label>
              </form>
            </li>
          @endforeach
        </ul>
      @endif
    </div>
    <footer class="flex">
        <a class="bg-blue-light hover:bg-blue inline-block text-white font-bold py-2 px-4 rounded-sm cursor-pointer no-underline" href="/projects/{{ $project->id }}/edit">
          Edit
        </a>
        <form class="hidden" action="/projects/{{ $project->id }}" method="POST" id="delete-{{ $project->id }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
        </form>
        <button class="inline-block pl-4 no-underline text-grey-dark hover:text-grey-darker" data-delete-project="{{ $project->id }}">
          Delete
        </button>
    </footer>
  </div>
  <div class="container mx-auto">
    @include('errors')
    <form action="/projects/{{ $project->id }}/tasks" method="POST">
      @csrf
      <div class="flex flex-row">
        <label for="description" class="flex flex-col w-64">
          <span class="mb-2 cursor-pointer">Add a new task</span>
          <input class="border-b border-grey pb-2" type="text" id="description" name="description" required>
        </label>
        <button type="submit" class="bg-orange-dark hover:bg-orange-dark inline-block text-white font-bold py-2 px-10 rounded-sm cursor-pointer no-underline">Add</button>
      </div>
    </form>
  </div>
@endsection

@section('scripts')
  <script>
    var $deleteButtons = $('[data-delete-project]');
    $deleteButtons.on('click', function() {
      // Get the id of the project we want to delete.
      id = getProjectToBeDeleted(event);

      // Pass through the id to Sweet Alert.
      initSweetAlert(id);
    });

    function getProjectToBeDeleted(event) {
      return event.target.dataset.deleteProject;
    }

    function initSweetAlert($project) {
      swal({
        title: "Are you sure?",
        text: "You will not be able to recover this project.",
        icon: "warning",
        buttons: ["Keep project", "Delete it"],
        dangerMode: true
      })
      .then((willDelete) => {
        if(willDelete) {
          $('#delete-' + $project).submit();
        }
      });
    }
  </script>
@endsection