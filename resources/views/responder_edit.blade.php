<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Responder</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="container mt-5 col-7 p-4 bg-light rounded shadow-sm">
        <h2 class="mb-4">Edit Responder</h2>

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

        <form action="{{ route('responder.update', $responder->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="form-control"
                    value="{{ $responder->full_name }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone (Optional)</label>
                <input type="text" name="phone" id="phone" class="form-control"
                    value="{{ $responder->phone }}">
            </div>

            <div class="mb-3">
                <label for="custom_number_guest" class="form-label">Allow Custom Guest?</label>
                <select name="custom_number_guest" id="custom_number_guest" class="form-select" required>
                    <option value="0" {{ $responder->custom_number_guest == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $responder->custom_number_guest == 1 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>

            <div class="mb-3" id="maxGuestWrapper">
                <label for="max_guest_number" class="form-label">Max Guests</label>
                <input type="number" name="max_guest_number" id="max_guest_number" class="form-control"
                    min="1" value="{{ $responder->max_guest_number }}">
            </div>

            <div class="mb-3">
                <label for="number_of_guests" class="form-label">Number of Guests (Optional)</label>
                <input type="number" class="form-control" id="number_of_guests" name="number_of_guests"
                    value="{{ $responder->number_of_guests }}" min="0">
            </div>

            <div class="mb-3">
                <label for="is_attending" class="form-label">Is Attending (Optional)</label>
                <select class="form-select" id="is_attending" name="is_attending" >
                    <option value="">-- Pilih Status --</option>
                    <option value="1" @if(old('is_attending', $responder->is_attending) == 1) selected @endif>Yes</option>
                    <option value="0" @if(old('is_attending', $responder->is_attending) == 0) selected @endif>No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('responder') }}" class="btn btn-secondary ms-2">Back</a>
        </form>
    </div>

    <script>
        const customSelect = document.getElementById('custom_number_guest');
        const maxGuestWrapper = document.getElementById('maxGuestWrapper');
        const maxGuestInput = document.getElementById('max_guest_number');

        function toggleMaxGuest() {
            if (customSelect.value === '1') {
                maxGuestWrapper.style.display = 'block';
                maxGuestInput.required = true;
            } else {
                maxGuestWrapper.style.display = 'none';
                maxGuestInput.required = false;
                maxGuestInput.value = '';
            }
        }

        customSelect.addEventListener('change', toggleMaxGuest);
        toggleMaxGuest();
    </script>
</body>
</html>
