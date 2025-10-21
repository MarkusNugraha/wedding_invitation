<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google" content="notranslate"> {{-- Disable Google Translate --}}
    <title>Wishes Controller</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <div class="container mt-5 col-11 col-md-7 p-4 bg-light rounded shadow-sm">
        <h3 class="mb-4">Wishes List</h3>
        
        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Search + Filter --}}
        <div class="mb-3 overflow-auto"">
            <form method="GET" action="{{ route('wish') }}" class="d-flex align-items-center overflow-auto" style="gap: 8px; min-width: max-content">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Enter name or wishes..."
                    value="{{ $search ?? '' }}"
                    style="width: 200px; flex-shrink: 0;"
                >

                {{-- Tombol Reset --}}
                @if(!empty($search) || request('is_active') !== null)
                    <a href="{{ route('wish') }}" class="btn btn-outline-secondary" title="Reset Search">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                @endif

                {{-- Tombol Search --}}
                <button type="submit" class="btn btn-outline-primary">
                    <i class="fa-solid fa-magnifying-glass"></i> Search
                </button>

                {{-- Tombol Filter isActive --}}
                <button type="submit" name="is_active" value="{{ request('is_active', '1') == '1' ? '0' : '1' }}"
                    class="btn btn-outline-{{ request('is_active', '1') == '1' ? 'danger' : 'success' }}"
                    title="{{ request('is_active', '1') == '1' ? 'Tampilkan Non Aktif' : 'Tampilkan Aktif' }}">
                    @if(request('is_active', '1') == '1')
                        <i class="fa-solid fa-eye-slash"></i> Nonaktif
                    @else
                        <i class="fa-solid fa-eye"></i> Aktif
                    @endif
                </button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-secondary">
                    <tr class="text-center align-middle">
                        <th>No</th>
                        <th>Wish Name</th>
                        <th>Wish Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wishes as $index => $r)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $r->wish_name }}</td>
                            <td>{{ $r->wish_message }}</td>
                            <td class="text-center">
                                @if($r->is_active == '1')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center" style="white-space: nowrap;">
                                <div class="d-flex justify-content-center flex-nowrap align-items-center" style="gap: 6px;">
                                    <!-- Edit Button -->
                                    <a href="{{ route('wish.edit', $r->id) }}"
                                    class="btn btn-sm btn-outline-warning"
                                    title="Edit Wish">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if($wishes->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted">No wishes found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
