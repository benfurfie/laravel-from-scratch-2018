@extends('layouts.app')

@section('body')
  <div class="container mx-auto py-10">
    <header class="mb-8 border-b pb-2 mb-6">
      <h1>{{ $project->title }}</h1>
    </header>
    <div class="mb-10">
      <p>{{ $project->description }}</p>
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