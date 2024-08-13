<!-- resources/views/report/index.blade.php -->

@extends('layouts.admin')

@section('content')


<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <label for="category" class="form-label">Select Task</label>
    <select class="form-control" id="project-select" required>
        <option value="" selected disabled>Select a Task</option>
        @foreach($projects as $project)
        <option value="{{ $project->id }}">{{ $project->project_name }}</option>
        @endforeach
    </select>
</div>

<h3 id="project-hours"></h3>

<ul id="task-list"></ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#project-select').on('change', function() {
    var projectId = $(this).val();

    $.ajax({
        url: '/projects/' + projectId + '/hours',
        type: 'GET',
        success: function(response) {
            if (response.total_hours !== undefined) {
                $('#project-hours').text(response.project_name + ' (Total hours: ' + response.total_hours + ')');

                // Optional: Update the task list if needed
                $('#task-list').empty();
                $.each(response.tasks, function(index, task) {
                    $('#task-list').append('<li>' + task.task_name + ' - ' + task.hour + ' hours</li>');
                });
            } else {
                $('#project-hours').text('No hours available');
            }
        },
        error: function(xhr, status, error) {
            console.log('Error: ' + error);
        }
    });
});

</script>

@endsection