<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Todo List</title>

  {{-- font Awesome --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

  {{-- MDB --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>

</head>
<body class="bg-primary">
  <div class="container w-50 mt-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h3 style="font-family: montserrat; font-weight: 600" class="text-center">To-do List</h3>
        <form action="{{ route('store') }}" method="post" autocomplete="off">
          @csrf
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Add your new todo" name="content">
            <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
          </div>
        </form>
        {{-- if task count --}}
        @if (count($todolists))
        <ul class="list-group list-group-flush mt-3">
          @foreach ($todolists as $todolist)
            <li class="list-group-item">
              <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                {{ $todolist->content }}
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-link btn-sm float-end"><i class="fas fa-trash"></i></button>
              </form>
            </li>
          @endforeach
        </ul>
        @else
        <p class="text-center mt-3">No Task!</p>
        @endif
      </div>
      
      @if (count($todolists))
        <div class="card-footer">
            You have {{ count($todolists  ) }} pending tasks
        </div>
      @else

      @endif
    </div>
  </div>
</body>
</html>