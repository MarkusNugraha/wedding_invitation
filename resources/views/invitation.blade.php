<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    <audio id="bgMusic" loop>
        {{-- <source src="{{ asset('music/Ed Sheeran - Perfect.mp3') }}" type="audio/mpeg"> --}}
        {{-- <source src="{{ asset('music/Justin Bieber - GO BABY.mp3') }}" type="audio/mpeg"> --}}
        {{-- <source src="{{ asset('music/John Legend - All of Me.mp3') }}" type="audio/mpeg"> --}}
        {{-- <source src="{{ asset('music/Westlife -  Beautiful in white.mp3') }}" type="audio/mpeg"> --}}
        <source src="{{ asset('music/Calum Scott - You Are The Reason.mp3') }}" type="audio/mpeg">

        Your browser does not support the audio element.
    </audio>

    <!-- Cover -->
    <div id="cover" class="cover d-flex flex-column justify-content-center align-items-center text-center">
        <div class="cover-content">
            {{-- Check if $reponder exists --}}
            @if ($responder)
                <h2 class="font-playfair-display">Dear, {{ $responder->full_name ?? 'Guest' }}</h2>
            @endif
            <h1 class="mb-5 font-playfair-display">You're Invited 🎉</h1>
            {{-- <h1 class="mb-4">You're Invited</h1> --}}

            <p class="mb-2 mt-5 font-euphoria-script">Michael & Yohana</p>
            <button id="openInvitationBtn" class="btn btn-custom">Open Invitation</button>
        </div>
    </div>


    <div id="main-content" class="d-none">
        <div class="position-relative text-center">
            <img src="{{ asset('images/image1(edited).jpg') }}" class="img-fluid" alt="Foto Pasangan">
            {{-- Button Music --}}
            <div class="position-absolute top-0 end-0 sticky-top">
                <button id="toggleMusicBtn" onclick="toggleMusic()" style="font-size: 24px; background: none; border: none;">
                    <i id="musicIcon" class="fas fa-volume-xmark"></i>
                </button>
            </div>

            {{-- Title --}}
            <div class="position-absolute top-50 start-50 translate-middle animate-on-scroll fade-in">
                <div class="font-noto-sans title1">OUR WEDDING DAY</div>
                <div class="font-noto-sans title2 mt-4">Michael & Yohana</div>
            </div>
        </div>

        <div class="py-5"></div>

        <div class="position-relative">
            <img src="{{ asset('images/bunga-kiri.png') }}" class="flower flower-left" alt="Bunga Kiri" class="bunga-kiri">

            <div class="container col-7 text-end animate-on-scroll slide-in-right">
                <div class="font-noto-sans groom-name">Michael Cahyadi Kuslin</div>
                <div class="font-playfair-display groom-name-detail">The first child of</div>
                <div class="font-playfair-display groom-name-detail">Mr. Yohanes Antony Koesno Kuslin</div>
                <div class="font-playfair-display groom-name-detail">& Mrs. Lie Fee Ling</div>
            </div>

            <div class="py-5 text-center">
                <div class="font-euphoria-script">&</div>
            </div>

            <div class="container col-7 animate-on-scroll slide-in-left">
                <div class="font-noto-sans groom-name">Yohana Alvania Sembodo</div>
                <div class="font-playfair-display groom-name-detail">The first child of</div>
                <div class="font-playfair-display groom-name-detail">Mr. Gatot Sembodo &</div>
                <div class="font-playfair-display groom-name-detail">Mrs. Tio Lie Tju</div>
            </div>

            <img src="{{ asset('images/bunga-kanan.png') }}" class="flower flower-right" alt="Bunga Kanan" class="bunga-kanan">
        </div>

        {{-- <div class="py-5"></div>

        <img src="{{ asset('images/image2(edited1).jpg') }}" class="img-fluid" alt="Foto Pasangan"> --}}

        <div class="py-5"></div>

        {{-- Holy Matrimony --}}
        <div class="text-center animate-on-scroll slide-in-top">
            <div class="font-noto-sans date-title pb-4">Holy Matrimony</div>
            <div class="font-playfair-display date fw-bold">Saturday, 8 November 2025</div>
            <div class="font-playfair-display date">10:00 - 11:00 WIB</div>
            <div class="font-playfair-display date">Gereja Santo Yosafat</div>
            <div class="font-playfair-display date">Jl. Kri Yos Sudarso, Medokan Semampir, Kec. Sukolilo, Surabaya, Jawa Timur 60119</div>

            <a class="btn btn-secondary my-5" href="https://maps.app.goo.gl/st3iJHRG4ckeUurL7" target="_blank">View Location</a>
        </div>

        <div class="py-5"></div>

        {{-- Reception --}}
        <div class="text-center animate-on-scroll slide-in-top">
            <div class="font-noto-sans date-title pb-4">Reception</div>
            <div class="font-playfair-display date fw-bold">Saturday, 8 November 2025</div>
            <div class="font-playfair-display date">18:00 - selesai</div>
            <div class="font-playfair-display date">Tristar Restaurant Surabaya</div>
            <div class="font-playfair-display date">Jl. Ps. Besar Wetan No.20, Alun-alun Contong, Kec. Bubutan, Surabaya, Jawa Timur 60174</div>

            <a class="btn btn-secondary my-5" href="https://maps.app.goo.gl/9BT7jkLZDW5MBTcU6" target="_blank">View Location</a>
        </div>

        <div class="py-5"></div>

        <div class="col-7 p-4 text-center bg-light rounded shadow-sm animate-on-scroll slide-in-right" style="max-width: 500px; margin: auto;">
            <div class="font-noto-sans virtual-blessings-title pb-4">Virtual Blessings</div>
            <div class="font-playfair-display virtual-blessings">
                Your generosity and thoughtfulness mean everything to us.
                Thanks for celebrating our special day!
            </div>

            <a class="btn btn-custom w-25 mx-auto mt-5 mb-3" data-bs-toggle="modal" data-bs-target="#sendGiftModal">
                Send Gift
            </a>
        </div>

        <div class="py-5"></div>

        <div class="col-7 p-4 bg-light rounded shadow-sm animate-on-scroll slide-in-left" style="max-width: 500px; margin: auto;">
            <form action="{{ route('submit-rsvp') }}" method="POST">
            {{-- <form id="rsvpForm" action="{{ route('submit-rsvp') }}" method="POST"> --}}
                @csrf
                <div class="font-noto-sans rsvp-title text-center">RSVP</div>

                <!-- Radio Button -->
                <div class="mt-3">
                    <label class="font-playfair-display rsvp fw-bold mb-2">Will you attend ?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_attending" id="yes" value="1" required>
                        <label class="form-check-label font-noto-sans" for="yes">
                            Yes, I will attend
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_attending" id="no" value="0" required>
                        <label class="form-check-label font-noto-sans" for="no">
                            I'd love to, but I can't
                        </label>
                    </div>
                </div>

                <!-- Full Name -->
                <div class="my-5">
                    <label for="full_name" class="font-playfair-display rsvp fw-bold mb-2">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Your full name"
                    value="{{ $responder->full_name ?? '' }}" @if(isset($responder)) disabled @endif required>
                </div>

                <div id="optional-fields" style="display: none;">
                    <!-- Number of Guests -->
                    <div class="mb-4">
                        <label for="number_of_guests" class="font-playfair-display rsvp fw-bold mb-2">Number of Guests</label>
                        <select class="form-select" id="number_of_guests" name="number_of_guests" required>
                            <option value="1" selected>2 Guest</option>
                            <option value="2">Family Off</option>
                        </select>
                    </div>

                    <!-- Family Off Input -->
                    <div class="mb-4" id="family-off-wrapper">
                        <label for="family_off_count" class="font-playfair-display rsvp fw-bold mb-2">Family Member Count</label>
                        <input type="number" class="form-control" id="family_off_count" name="family_off_count" min="1"
                            placeholder="Masukkan jumlah keluarga">
                    </div>

                    <!-- Phone Number -->
                    <div class="mb-5">
                        <label for="phone" class="font-playfair-display rsvp fw-bold mb-2">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+62123456" required>
                    </div>
                </div>

                <!-- Submit -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn-custom">Submit</button>
                </div>
            </form>
        </div>

        <div class="py-5"></div>
        <div class="py-5"></div>

        <div class="col-10 p-4 text-center animate-on-scroll slide-in-bottom" style="margin: auto;">
            <div class="font-noto-sans send-wishes-title">Send Wishes</div>

            <a class="btn btn-custom w-25 mx-auto mt-5 mb-3" data-bs-toggle="modal" data-bs-target="#sendWishesModal">
                Write Your Wishes
            </a>

            {{-- List of Wishes --}}
            <div class="mt-4 wishes-list" style="max-height: 500px; overflow-y: auto;">
                @forelse($wishes as $wish)
                    <div class="p-4 bg-light rounded shadow-sm mb-3 text-start">
                        <div class="fw-bold">{{ $wish->wish_name }}</div>
                        {{-- <div class="text-muted small">{{ $wish->created_at->format('d M Y H:i') }}</div> --}}
                        <p class="mt-2 mb-0">{{ $wish->wish_message }}</p>
                    </div>
                @empty
                    <div class="p-4 bg-light rounded shadow-sm text-center">
                        <em>No wishes yet. Be the first to write 💌</em>
                    </div>
                @endforelse
            </div>

        </div>

        <div class="py-5"></div>

        <!-- Modal Success / Error Submit RSVP -->
        {{-- <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header
                @if (session('success')) bg-success text-white
                @elseif (session('error')) bg-danger text-white
                @endif">
                        <h5 class="modal-title" id="notificationModalLabel">
                            {{ session('success') ? 'Success' : 'Error' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ session('success') ?? session('error') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="modal fade" id="notificationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div id="notificationHeader" class="modal-header">
                        <h5 class="modal-title" id="notificationTitle"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="notificationMessage"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Send Gift -->
        <div class="modal fade" id="sendGiftModal" tabindex="-1" aria-labelledby="sendGiftModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header justify-content-center">
                        <h5 class="modal-title text-center" id="sendGiftModalLabel">Virtual Blessings</h5>
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body text-center">
                        <ul class="list-unstyled">

                            <!-- Item 1 -->
                            <li class="mb-3">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('images/bca-logo.png')}}" alt="BCA Logo" class="img-fluid my-2"
                                        style="max-width:120px;">
                                </div>
                                <strong>a.n. Yohana Alvania Sembodo</strong><br>
                                <strong id="rek1">1234567890</strong>
                                <button class="btn btn-sm btn-outline-primary ms-2"
                                    onclick="copyToClipboard('rek1')">Copy</button>
                            </li>

                            <!-- Item 2 -->
                            <li class="mb-3">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('images/bca-logo.png')}}" alt="BCA Logo" class="img-fluid my-2"
                                        style="max-width:120px;">
                                </div>
                                <strong>a.n. Michael Cahyadi Kuslin</strong><br>
                                <strong id="rek2">0987654321</strong>
                                <button class="btn btn-sm btn-outline-primary ms-2"
                                    onclick="copyToClipboard('rek2')">Copy</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Send Wishes --}}
        <div class="modal fade" id="sendWishesModal" tabindex="-1" aria-labelledby="sendWishesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header justify-content-center">
                        <h5 class="modal-title text-center" id="sendWishesModalLabel">Write Your Wishes</h5>
                        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <form action="{{ route('submit-wishes') }}" method="POST">
                        {{-- <form id="wishForm" action="{{ route('submit-wishes') }}" method="POST"> --}}
                            @csrf
                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="wish_name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="wish_name" name="wish_name" value="{{ $responder->full_name ?? '' }}" @if(isset($responder)) disabled @endif required>
                            </div>

                            <!-- Pesan -->
                            <div class="mb-3">
                                <label for="wish_message" class="form-label">Your Wishes</label>
                                <textarea class="form-control" id="wish_message" name="wish_message" rows="4"
                                    required></textarea>
                            </div>

                            <!-- Submit -->
                            <div class="text-center">
                                <button type="submit" class="btn-custom">Send Wish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap JS Bundle (dengan Popper) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Modal Session --}}
    @if (session('success') || session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var modal = new bootstrap.Modal(document.getElementById('notificationModal'));
                modal.show();
            });
        </script>
    @endif

    <script>
        // Toggle optional fields
        document.addEventListener('DOMContentLoaded', function () {
            // Cover
            const cover = document.getElementById("cover");
            const mainContent = document.getElementById("main-content");
            const openBtn = document.getElementById("openInvitationBtn");

            openBtn.addEventListener("click", function () {
                cover.classList.add("hidden");
                mainContent.classList.remove("d-none");
                setTimeout(() => {
                    cover.style.display = "none";
                }, 500);

                // Play music
                toggleMusic();
            });

            const yesRadio = document.getElementById('yes');
            const noRadio = document.getElementById('no');
            const optionalFields = document.getElementById('optional-fields');

            const guestSelect = document.getElementById('number_of_guests');
            const familyOffWrapper = document.getElementById('family-off-wrapper');
            const familyOffInput = document.getElementById('family_off_count');

            function toggleOptionalFields() {
                if (yesRadio.checked) {
                    optionalFields.style.display = 'block';
                    optionalFields.querySelectorAll('select, input').forEach(el => el.required = true);

                    toggleFamilyOff();
                } else {
                    optionalFields.style.display = 'none';
                    optionalFields.querySelectorAll('select, input').forEach(el => el.required = false);
                    familyOffWrapper.style.display = 'none';
                    familyOffInput.required = false;
                }
            }

            function toggleFamilyOff() {
                if (guestSelect.value === '2') {
                    familyOffWrapper.style.display = 'block';
                    familyOffInput.required = true;
                } else {
                    familyOffWrapper.style.display = 'none';
                    familyOffInput.required = false;
                }
            }

            guestSelect.addEventListener('change', function () {
                toggleFamilyOff();
            });

            yesRadio.addEventListener('change', toggleOptionalFields);
            noRadio.addEventListener('change', toggleOptionalFields);

            // In case the form is reloaded or autofilled
            toggleOptionalFields();


            // Animate on Scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("visible");
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll(".animate-on-scroll").forEach((el) => {
                observer.observe(el);
            });
        });

        const music = document.getElementById('bgMusic');
        const musicIcon = document.getElementById('musicIcon');
        // Set volume 50%
        music.volume = 0.3;

        function toggleMusic() {
            if (music.paused) {
                music.play();
                musicIcon.classList.remove('fa-volume-xmark');
                musicIcon.classList.add('fa-volume-high');
            } else {
                music.pause();
                musicIcon.classList.remove('fa-volume-high');
                musicIcon.classList.add('fa-volume-xmark');
            }
        }

        function copyToClipboard(elementId) {
            const text = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(text);
        }

        // Show Notification Modal
        function showNotification(success, message) {
            const title = document.getElementById("notificationTitle");
            const msg = document.getElementById("notificationMessage");
            const header = document.getElementById("notificationHeader");

            if (success) {
                title.innerText = "Success";
                header.className = "modal-header bg-success text-white";
            } else {
                title.innerText = "Error";
                header.className = "modal-header bg-danger text-white";
            }

            msg.innerText = message;

            var modal = new bootstrap.Modal(document.getElementById('notificationModal'));
            modal.show();
        }

        // Ajax
        // RSVP FORM
        const rsvpForm = document.getElementById("rsvpForm");
        if (rsvpForm) {
            rsvpForm.addEventListener("submit", function (e) {
                e.preventDefault(); // cegah reload

                let formData = new FormData(rsvpForm);

                fetch(rsvpForm.action, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                })
                    .then(res => res.json())
                    .then(data => {
                        // if (data.success) {
                        //     alert("✅ RSVP submitted successfully!");
                        //     rsvpForm.reset();
                        // } else {
                        //     alert("❌ Failed to submit RSVP!");
                        // }
                        showNotification(data.success, data.message);

                        if (data.success) {
                            resetRsvpForm();
                        }
                    })
                    // .catch(err => console.error(err));
                    .catch(err => {
                        showNotification(false, "Unexpected error: " + err);
                    });
            });
        }

        // WISHES FORM
        const wishForm = document.getElementById("wishForm");
        const wishesList = document.querySelector(".wishes-list");

        if (wishForm) {
            wishForm.addEventListener("submit", function (e) {
                e.preventDefault();

                let formData = new FormData(wishForm);

                fetch(wishForm.action, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    },
                    body: formData
                })
                    .then(res => res.json())
                    .then(data => {
                        showNotification(data.success, data.message);

                        if (data.success) {
                            // Tambahkan wish baru ke list tanpa reload
                            let newWish = `
                                <div class="p-4 bg-light rounded shadow-sm mb-3 text-start">
                                    <div class="fw-bold">${data.wish.wish_name}</div>
                                    <p class="mt-2 mb-0">${data.wish.wish_message}</p>
                                </div>
                            `;
                            wishesList.insertAdjacentHTML("afterbegin", newWish);

                            wishForm.reset();

                            // Tutup modal
                            let modal = bootstrap.Modal.getInstance(document.getElementById("sendWishesModal"));
                            modal.hide();
                    } else {
                        // alert("❌ Failed to submit wish!");
                        showNotification(false, "Unexpected error: " + err);
                    }
                })
                .catch(err => console.error(err));
            });
        }

        // Reset RSVP Form
        function resetRsvpForm() {
            const rsvpForm = document.getElementById("rsvpForm");
            if (!rsvpForm) return;

            rsvpForm.reset();
            document.getElementById("optional-fields").style.display = "none";
            document.getElementById("family-off-wrapper").style.display = "none";
        }

    </script>
</body>
</html>
