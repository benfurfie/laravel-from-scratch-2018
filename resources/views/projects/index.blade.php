@extends('layouts.app')

@section('body')
  <div class="container mx-auto py-10">
    <header class="mb-4">
      <h1>Projects</h1>
    </header>

    <ul class="list-reset">
      @forelse ($projects as $project)
        <li class="border-b border-grey-light flex justify-between items-center w-full py-2">
          <a class="text-grey-darkest no-underline" href="/projects/{{ $project->id }}">
            {{ $project->title }}
          </a>
          <span>
            <a class="bg-blue hover:bg-grey-dark inline-block text-white font-bold py-2 px-4 rounded-sm cursor-pointer no-underline" href="/projects/{{ $project->id }}/edit">
              Edit
            </a>
            <form class="hidden" action="/projects/{{ $project->id }}" method="POST" id="delete-{{ $project->id }}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
            </form>
            <button class="inline-block pl-2 no-underline text-grey-dark hover:text-grey-darker" data-delete-project="{{ $project->id }}">
              Delete
            </button>
          </span>
        </li>
      @empty
        <li>No projects found.</li>
      @endforelse
    </ul>
    <div class="my-4">
      <a class="bg-orange hover:bg-orange-dark inline-block text-white font-bold py-2 px-4 rounded-sm cursor-pointer no-underline" href="/projects/create">Create new</a>
    </div>
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