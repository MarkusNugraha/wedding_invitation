<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Responder</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    {{-- Form Add New Responder --}}
    <div class="container mt-5 col-7 p-4 bg-light rounded shadow-sm">
        <h2 class="mb-4">Add New Responder</h2>

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

        <form action="{{ route('addnewresponder') }}" method="POST">
            @csrf

            {{-- Full Name --}}
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="form-control"
                    value="{{ old('full_name') }}" required>
            </div>

            {{-- Phone --}}
            <div class="mb-3">
                <label for="phone" class="form-label">Phone (Optional)</label>
                <input type="text" name="phone" id="phone" class="form-control"
                    value="{{ old('phone') }}">
            </div>

            {{-- Show Virtual Blessing --}}
            <div class="mb-3">
                <label for="show_virtual_blessing" class="form-label">
                    Show Virtual Blessing Section
                </label>
                <select name="show_virtual_blessing" id="show_virtual_blessing" class="form-select" required>
                    <option value="1" selected>Yes</option>
                    <option value="0" >No</option>
                </select>
            </div>


            {{-- Custom Number of Guests --}}
            <div class="mb-3">
                <label for="custom_number_guest" class="form-label">Allow Custom Guest?</label>
                <select name="custom_number_guest" id="custom_number_guest" class="form-select" required>
                    <option value="0" selected>No (2 guest only)</option>
                    <option value="1">Yes (Family)</option>
                </select>
            </div>

            {{-- Max Guest Number --}}
            <div class="mb-3" id="maxGuestWrapper" style="display: none;">
                <label for="max_guest_number" class="form-label">Max Guests</label>
                <input type="number" name="max_guest_number" id="max_guest_number" class="form-control"
                    min="1" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Responder</button>
        </form>
    </div>


    <div class="container mt-5 col-7 p-4 bg-light rounded shadow-sm">
        <h3 class="mb-4">Responder List</h3>

        {{-- Search + Filter --}}
        <div class="mb-3">
            <form method="GET" action="{{ route('responder') }}" class="d-flex align-items-center" style="gap: 8px;">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search by name or phone..."
                    value="{{ $search ?? '' }}"
                    style="width: 250px;"
                >

                {{-- Tombol Search --}}
                <button type="submit" class="btn btn-outline-primary">
                    <i class="fa-solid fa-magnifying-glass"></i> Search
                </button>

                {{-- Tombol Reset --}}
                {{-- @if(!empty($search) || request('is_active') !== null)
                    <a href="{{ route('responder') }}" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-rotate-left"></i> Reset
                    </a>
                @endif --}}

                {{-- Tombol Filter isActive --}}
                {{-- <button type="submit" name="is_active" value="{{ request('is_active') == '1' ? '0' : '1' }}"
                    class="btn btn-outline-{{ request('is_active') == '1' ? 'danger' : 'success' }}"
                    title="{{ request('is_active') == '1' ? 'Tampilkan Non Aktif' : 'Tampilkan Aktif' }}">
                    @if(request('is_active') == '1')
                        <i class="fa-solid fa-eye-slash"></i> Nonaktif
                    @else
                        <i class="fa-solid fa-eye"></i> Aktif
                    @endif
                </button> --}}
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>No</th>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>Attending</th>
                        <th>Number of Guests</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($responders as $index => $r)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $r->full_name }}</td>
                            <td>{{ $r->phone }}</td>
                            <td>
                                @if($r->is_attending == 1)
                                    <span class="badge bg-success">Yes</span>
                                @elseif($r->is_attending == 0)
                                    <span class="badge bg-danger">No</span>
                                @else
                                    <span class="badge bg-secondary">Pending</span>
                                @endif
                            </td>
                            <td>{{ $r->number_of_guests ?? '-' }}</td>
                            <td class="text-center">
                                <!-- Edit Button -->
                                <a href="{{ route('responder.edit', $r->id) }}"
                                class="btn btn-sm btn-outline-warning me-2"
                                title="Edit Responder">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <!-- Copy Link Button -->
                                <button
                                    class="btn btn-sm btn-outline-secondary me-2"
                                    onclick="copyLink('{{ url('/invitation/' . $r->uuid) }}')"
                                    title="Copy Invitation Link">
                                    <i class="fa-solid fa-copy"></i>
                                </button>

                                <!-- Open Invitation Button -->
                                <a href="{{ url('/invitation/' . $r->uuid) }}"
                                target="_blank"
                                class="btn btn-sm btn-outline-primary">
                                    <i class="fa-solid fa-link"></i> Open Invitation
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Toggle Custom Guest and Max Guest
        const customGuestSelect = document.getElementById('custom_number_guest');
        const maxGuestWrapper = document.getElementById('maxGuestWrapper');

        function toggleMaxGuest() {
            if (customGuestSelect.value === "1") {
                maxGuestWrapper.style.display = 'block';
                document.getElementById('max_guest_number').setAttribute('required', true);
            } else {
                maxGuestWrapper.style.display = 'none';
                document.getElementById('max_guest_number').removeAttribute('required');
            }
        }

        toggleMaxGuest();
        customGuestSelect.addEventListener('change', toggleMaxGuest);

        function copyLink(link) {
            navigator.clipboard.writeText(link).then(() => {
                const alert = document.createElement('div');
                alert.className = 'alert alert-success position-fixed top-0 end-0 m-3 py-2 px-3 fade show';
                alert.style.zIndex = '9999';
                alert.textContent = '✅ Link copied to clipboard!';
                document.body.appendChild(alert);
                setTimeout(() => alert.remove(), 2000);
            }).catch(err => {
                alert('❌ Failed to copy: ' + err);
            });
        }
    </script>
</body>
</html>
