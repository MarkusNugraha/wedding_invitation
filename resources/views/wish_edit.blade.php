<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Wishes</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="container mt-5 col-7 p-4 bg-light rounded shadow-sm">
        <h2 class="mb-4">Edit Wishes</h2>

        @if(session('success'))
            <div class="alert alert-success">{!! session('success') !!}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('wish.update', $wish->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="wish_name" class="form-label">Name</label>
                <input type="text" id="wish_name" name="wish_name"
                       class="form-control" value="{{ $wish->wish_name }}" readonly>
            </div>

            <div class="mb-3">
                <label for="wish_message" class="form-label">Message</label>
                <textarea id="wish_message" name="wish_message"
                          class="form-control" rows="3" required>{{ $wish->wish_message }}</textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                    value="1" {{ $wish->is_active ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active</label>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('wish') }}" class="btn btn-secondary ms-2">Back</a>
        </form>
    </div>
</body>
</html>
