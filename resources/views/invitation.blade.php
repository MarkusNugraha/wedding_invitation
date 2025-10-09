<!DOCTYPE html>
<html lang="en" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google" content="notranslate"> {{-- Disable Google Translate --}}
    <title>The Wedding of Michael & Yohana</title>

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
                <h2 class="font-playfair-display">Dear, <strong>{{ $responder->full_name ?? 'Guest' }}</strong></h2>
            @endif
            <h2 class="font-playfair-display">You're Invited 🎉</h2>
            {{-- <h1 class="mb-4">You're Invited</h1> --}}

            {{-- <p class="mb-2 mt-5 font-euphoria-script">Michael<br>&<br>Yohana</p> --}}
            <div class="mb-5 mt-5 font-euphoria-script text-center">
                Michael<br>&<br>Yohana
            </div>
            <button id="openInvitationBtn" class="btn btn-custom">Open Invitation</button>
        </div>
    </div>


    <div id="main-content" class="d-none">
        <div class="position-relative text-center">
            <img src="{{ asset('images/image1(edited).jpg') }}" class="img-fluid" alt="Foto Pasangan">
            {{-- Button Music --}}
            <div class="position-absolute top-0 end-0 sticky-top">
                <button id="toggleMusicBtn" onclick="toggleMusic()" style="background: none; border: none;">
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
        <div class="text-center px-2 animate-on-scroll slide-in-top">
            <div class="font-noto-sans date-title pb-4">Holy Matrimony</div>
            <div class="font-playfair-display date fw-bold">Saturday, 8 November 2025</div>
            <div class="font-playfair-display date">10:00 - 11:00 WIB</div>
            <div class="font-playfair-display date">Gereja Santo Yosafat</div>
            <div class="font-playfair-display date">Jl. Kri Yos Sudarso, Medokan Semampir, Kec. Sukolilo, Surabaya, Jawa Timur 60119</div>

            <a class="btn btn-secondary my-5" href="https://maps.app.goo.gl/st3iJHRG4ckeUurL7" target="_blank">View Location</a>
        </div>

        <div class="py-5"></div>

        {{-- Reception --}}
        <div class="text-center px-2 animate-on-scroll slide-in-top">
            <div class="font-noto-sans date-title pb-4">Reception</div>
            <div class="font-playfair-display date fw-bold">Saturday, 8 November 2025</div>
            <div class="font-playfair-display date">18:00 - selesai</div>
            <div class="font-playfair-display date">Tristar Restaurant Surabaya</div>
            <div class="font-playfair-display date">Jl. Ps. Besar Wetan No.20, Alun-alun Contong, Kec. Bubutan, Surabaya, Jawa Timur 60174</div>

            <a class="btn btn-secondary my-5" href="https://maps.app.goo.gl/9BT7jkLZDW5MBTcU6" target="_blank">View Location</a>
        </div>

        <div class="py-5"></div>

        <div class="col-11 col-md-7 p-4 text-center bg-light rounded shadow-sm animate-on-scroll slide-in-right" style="max-width: 500px; margin: auto;">
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

        <div class="col-11 col-md-7 p-4 bg-light rounded shadow-sm animate-on-scroll slide-in-left" style="max-width: 500px; margin: auto;">
            <form id="rsvpForm" action="{{ isset($responder) ? route('submit-rsvp') : route('submitnew-rsvp') }}" method="POST">
                @csrf
                <div class="font-noto-sans rsvp-title text-center">RSVP</div>

                <!-- Radio Button -->
                <div class="mt-3">
                    <label class="font-playfair-display rsvp fw-bold mb-2">Will you attend ?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_attending" id="yes" value="1"
                            @if(isset($responder) && $responder->is_attending == 1) checked @endif
                            @if(isset($responder) && $responder->is_attending != null) disabled @endif required>
                        <label class="form-check-label font-noto-sans" for="yes">
                            Yes, I will attend
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_attending" id="no" value="0"
                            @if(isset($responder) && $responder->is_attending == 0) checked @endif
                            @if(isset($responder) && $responder->is_attending != null) disabled @endif required>
                        <label class="form-check-label font-noto-sans" for="no">
                            I'd love to, but I can't
                        </label>
                    </div>
                </div>

                <!-- Full Name -->
                <div class="my-5">
                    <label for="full_name" class="font-playfair-display rsvp fw-bold mb-2">Full Name</label>
                    <input type="text" class="form-control font-noto-sans" id="full_name" name="full_name" placeholder="Your full name"
                    value="{{ $responder->full_name ?? '' }}" @if(isset($responder) && $responder->full_name != null) readonly @endif required>
                </div>

                <div id="optional-fields" style="@if(isset($responder) && $responder->is_attending == 1) display:block; @else display:none; @endif">
                    <!-- Number of Guests -->
                    <div class="mb-4">
                        <label for="number_of_guests" class="font-playfair-display rsvp fw-bold mb-2">Number of Guests</label>
                        <select class="form-select font-noto-sans" id="number_of_guests" name="number_of_guests"
                            @if((isset($responder) && $responder->number_of_guests) || (isset($responder) && $responder->custom_number_guest == 0))
                                readonly
                            @endif
                            required
                        >
                            <!-- 2 Guest -->
                            <option value="1"
                                @if((isset($responder) && $responder->custom_number_guest == 0) || (isset($responder) && $responder->number_of_guests == 2))
                                    selected
                                @endif
                            >
                                2 Guest
                            </option>

                            <!-- Family Off -->
                            <option value="2"
                                @if((isset($responder) && $responder->number_of_guests > 2) || (isset($responder) && $responder->custom_number_guest == 1))
                                    selected
                                @endif
                            >
                                Family
                            </option>
                        </select>
                    </div>


                    <!-- Family Off Input -->
                    <div class="mb-4" id="family-off-wrapper" style="@if(isset($responder) && $responder->custom_number_guest == 1) display:block; @else display:none; @endif">
                        <label for="family_off_count" class="font-playfair-display rsvp fw-bold mb-2">Family Member Count</label>

                        <div class="number-spinner mx-auto">
                            <button type="button" class="btn btn-custom btn-sm" id="decreaseCount" @if(isset($responder) && $responder->is_attending != null) disabled @endif>−</button>
                            <input
                                type="number"
                                class="form-control text-center font-noto-sans"
                                id="family_off_count"
                                name="family_off_count"
                                min="1"
                                data-max="{{ isset($responder) ? ($responder->max_guest_number ?? '') : '' }}"
                                {{-- placeholder="Masukkan jumlah keluarga" --}}
                                @if((isset($responder) && $responder->number_of_guests != null) ||
                                    (isset($responder) && $responder->custom_number_guest == 0))
                                    value="{{ $responder->number_of_guests }}" {{-- readonly --}}
                                @endif
                                required
                            >
                            <button type="button" class="btn btn-custom btn-sm" id="increaseCount" @if(isset($responder) && $responder->is_attending != null) disabled @endif>+</button>
                        </div>
                    </div>


                    <!-- Phone Number | Hide phone field -->
                    <div class="mb-5" style="display: none;">
                        <label for="phone" class="font-playfair-display rsvp fw-bold mb-2">Phone Number</label>
                        <input type="hidden" class="form-control font-noto-sans" id="phone" name="phone" placeholder="+62123456" value="{{ $responder->phone ?? '' }}"
                            @if(isset($responder) && $responder->phone != null) readonly @endif {{-- required --}}>
                    </div>
                </div>

                {{-- Set Responder ID --}}
                @if(isset($responder))
                    <input type="hidden" name="responder_id" value="{{ $responder->id }}">
                @endif

                <!-- Submit -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn-custom" id="rsvpSubmitBtn" @if(isset($responder) && $responder->is_attending != null) disabled @endif>Submit</button>
                </div>
            </form>
        </div>

        <div class="py-5"></div>
        <div class="py-5"></div>

        <div class="col-11 col-md-10 p-4 text-center animate-on-scroll slide-in-bottom" style="margin: auto;">
            <div class="font-noto-sans send-wishes-title">Send Wishes</div>

            <a class="btn btn-custom w-25 mx-auto mt-5 mb-3" data-bs-toggle="modal" data-bs-target="#sendWishesModal">
                Write Your Wishes
            </a>

            {{-- List of Wishes --}}
            <div class="mt-4 wishes-list" style="max-height: 500px; overflow-y: auto;">
                @forelse($wishes as $wish)
                    <div class="p-4 bg-light rounded shadow-sm mb-3 text-start">
                        <div class="fw-bold">{{ $wish->wish_name }}</div>
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
                                <strong>a.n. Michael Cahyadi Kuslin</strong><br>
                                <strong id="rek1">8705341814</strong>
                                <button class="btn btn-sm btn-outline-primary ms-2"
                                    onclick="copyToClipboard('rek1')">Copy</button>
                            </li>

                            <!-- Item 2 -->
                            <li class="mb-3">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('images/bca-logo.png')}}" alt="BCA Logo" class="img-fluid my-2"
                                        style="max-width:120px;">
                                </div>
                                <strong>a.n. Yohana Alvania Sembodo</strong><br>
                                <strong id="rek2">0182141028</strong>
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
                        <form id="wishForm" action="{{ route('submit-wishes') }}" method="POST">
                            @csrf
                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="wish_name" class="form-label">Your Name</label>
                                <input type="text" class="form-control font-noto-sans" id="wish_name" name="wish_name" value="{{ $responder->full_name ?? '' }}" @if(isset($responder)) readonly @endif required>
                            </div>

                            <!-- Pesan -->
                            <div class="mb-3">
                                <label for="wish_message" class="form-label">Your Wishes</label>
                                <textarea class="form-control font-noto-sans" id="wish_message" name="wish_message" rows="4"
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

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="confirmSubmitModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi RSVP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Are you sure you want to submit your RSVP? <br> --}}
                Apakah Anda yakin ingin mengirimkan RSVP ?<br>
                {{-- <small class="text-muted">Form can only be submitted once</small> --}}
                <small class="text-muted">Formulir RSVP ini hanya dapat dikirimkan sekali</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirmSubmitBtn">Ya, Kirim</button>
            </div>
            </div>
        </div>
    </div>


    {{-- Bootstrap JS Bundle (dengan Popper) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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

            // Disable input
            familyOffInput.addEventListener('keydown', (e) => e.preventDefault());

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

        @if(isset($responder->number_of_guests))
            readonlyDropdown();
        @endif

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

                // Tampilkan modal konfirmasi kirim RSVP
                const confirmModal = new bootstrap.Modal(document.getElementById("confirmSubmitModal"));
                confirmModal.show();

                // Konfirmasi kirim RSVP
                confirmSubmitBtn.onclick = function () {
                    confirmModal.hide();

                    let formData = new FormData(rsvpForm);
                    fetch(rsvpForm.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                        },
                        body: formData
                    })
                        .then(async (res) => {
                            const contentType = res.headers.get("content-type");
                            if (contentType && contentType.includes("application/json")) {
                                return res.json();
                            } else {
                                throw new Error("Invalid response (not JSON)");
                            }
                        })
                        .then(data => {
                            let messageText = "";
                            // Kalau pesan error >1 , dijadikan 1 string
                            if (!data.success && typeof data.message === "object") {
                                let errors = [];
                                for (let field in data.message) {
                                    if (data.message.hasOwnProperty(field)) {
                                        errors.push(...data.message[field]);
                                    }
                                }
                                messageText = errors.join("\n");
                            } else {
                                messageText = data.message;
                            }
                            showNotification(data.success, messageText);

                            if (data.success && data.status === 'update') {
                                disableRsvpForm(data.responder);
                            } else if (data.success && data.status === 'create') {
                                resetRsvpForm();
                            }
                        })
                        .catch(err => {
                            showNotification(false, "Unexpected error: " + err);
                        });
                    }
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
                .then(async (res) => {
                    const contentType = res.headers.get("content-type");
                    if (contentType && contentType.includes("application/json")) {
                        return res.json();
                    } else {
                        throw new Error("Invalid response (not JSON)");
                    }
                })
                .then(data => {
                        let messageText = "";
                        // Kalau pesan error >1 , dijadikan 1 string
                        if (!data.success && typeof data.message === "object") {
                            let errors = [];
                            for (let field in data.message) {
                                if (data.message.hasOwnProperty(field)) {
                                    errors.push(...data.message[field]);
                                }
                            }
                            messageText = errors.join("\n");
                        } else {
                            messageText = data.message;
                        }

                        if (data.success) {
                            showNotification(data.success, messageText);
                            // showNotification(true, data.message);

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
                            // tampilkan semua pesan error validasi
                            if (typeof data.message === "object") {
                                let errors = Object.values(data.message).flat().join("<br>");
                                showNotification(false, errors);
                            } else {
                                showNotification(false, data.message || "Something went wrong.");
                            }
                        }
                    })
                    .catch(err => {
                        showNotification(false, "Unexpected error: " + err);
                    });
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

        function disableRsvpForm(responderData) {
            const rsvpForm = document.getElementById("rsvpForm");
            if (!rsvpForm) return;

            rsvpForm.reset();

            // Default sembunyikan field opsional
            document.getElementById("optional-fields").style.display = "none";
            document.getElementById("family-off-wrapper").style.display = "none";

            if (responderData) {
                const select = document.getElementById("number_of_guests");
                const familyOffWrapper = document.getElementById("family-off-wrapper");
                const familyOffInput = document.getElementById("family_off_count");

                if (responderData.is_attending) {
                    if (responderData.is_attending == 1) {
                        document.getElementById("yes").checked = true;
                        document.getElementById("yes").disabled = true;
                        document.getElementById("no").disabled = true;

                        if (responderData.number_of_guests) {
                            // Set number of guests
                            if (parseInt(responderData.number_of_guests) === 2) {
                                select.value = "1";
                                familyOffWrapper.style.display = "none";
                            } else {
                                select.value = "2";
                                familyOffWrapper.style.display = "block";
                                familyOffInput.value = responderData.number_of_guests;
                                familyOffInput.readonly = true;
                            }

                            document.getElementById("optional-fields").style.display = "block";

                            // Set phone
                            if (responderData.phone) {
                                document.getElementById("phone").value = responderData.phone;
                                document.getElementById("optional-fields").style.display = "block";
                            }
                        }
                    } else if (responderData.is_attending == 0) {
                        document.getElementById("no").checked = true;
                        document.getElementById("yes").disabled = true;
                        document.getElementById("no").disabled = true;

                        // Jika tidak hadir, tidak perlu menampilkan optional fields
                    }
                }

                // Readonly full name
                if (responderData.full_name) {
                    document.getElementById("full_name").value = responderData.full_name;
                    document.getElementById("full_name").readonly = true;
                }

                // Readonly phone
                if (responderData.phone) {
                    document.getElementById("phone").value = responderData.phone;
                    document.getElementById("phone").readonly = true;
                }

                // Readonly dropdown
                select.setAttribute("readonly", true);
                familyOffInput.setAttribute("readonly", true);
                readonlyDropdown();

                // Disable increase and decrease button
                const decreaseBtn = document.getElementById("decreaseCount");
                const increaseBtn = document.getElementById("increaseCount");
                if (decreaseBtn) {
                    decreaseBtn.disabled = true;
                }
                if (increaseBtn) {
                    increaseBtn.disabled = true;
                }

                // Disable submit button
                const submitButton = document.getElementById("rsvpSubmitBtn");
                if (submitButton) {
                    submitButton.disabled = true;
                }
            }
        }

        // Readonly dropdown
        function readonlyDropdown() {
            const dropdown = document.getElementById("number_of_guests");
            dropdown.addEventListener("mousedown", function (e) {
                if (this.hasAttribute("readonly")) {
                    e.preventDefault();
                }
            });
        }

        // Count family off increase and decrease button
        const input = document.getElementById("family_off_count");
        const decreaseBtn = document.getElementById("decreaseCount");
        const increaseBtn = document.getElementById("increaseCount");

        decreaseBtn.addEventListener("click", () => {
            let currentValue = parseInt(input.value) || 1;
            if (currentValue > parseInt(input.min || 1)) {
                input.value = currentValue - 1;
            }
        });

        increaseBtn.addEventListener("click", () => {
            let currentValue = parseInt(input.value) || 1;

            // Check maximum guest
            const maxGuest = parseInt(input.dataset.max);
            if (!isNaN(maxGuest) && currentValue >= maxGuest) {
                return;
            }
            input.value = currentValue + 1;
        });
    </script>
</body>
</html>
