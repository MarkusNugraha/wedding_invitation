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
    {{-- Google Fonts --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    {{-- @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif --}}

    {{-- <div>
        <img src="{{ asset('images/image1.jpg') }}" alt="Foto Pasangan" class="img-fluid">
        <h1 class="judul-nama">JO & Michael</h1>
    </div> --}}

    {{-- <div class="position-relative text-center">
        <img src="{{ asset('images/image1(edited).jpg') }}" class="img-fluid" alt="Foto Pasangan">

        <div class="position-absolute top-50 start-50 translate-middle">
            <h5 class="font title1">OUR WEDDING DAY</h5>
            <h1 class="font title2 mt-4">JO & Michael</h1>
        </div>

        <div class="quote-section position-relative text-center text-primary py-5">
            <div class="container">
                <img src="{{ asset('images/rings-icon.png') }}" alt="Rings Icon" style="width: 80px;">
                <p class="fs-5 mt-3 mb-1">"I have found the one whom my soul loves."</p>
                <p class="fw-bold">- Song of Solomon 3:4 -</p>
            </div>
        </div>

    </div> --}}

    {{-- <div class="position-relative text-center">
        <img src="{{ asset('images/image1.jpg') }}" class="img-fluid w-100" alt="Foto Pasangan">

        <!-- Overlay gelap -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,0,0,0.4);"></div>

        <!-- Teks di atas gambar -->
        <div class="overlay-text position-absolute top-50 start-50 translate-middle">
            <h1 class="judul-nama">JO & Michael</h1>
        </div>
    </div> --}}

    {{-- <audio controls autoplay muted loop id="bgMusic">
        <source src="{{ asset('music/Justin Bieber - GO BABY.mp3') }}" type="audio/mpeg">
        <source src="{{ asset('music/Justin Bieber - GO BABY.mp3') }}" type="audio/ogg">
        Your browser does not support the audio element.
    </audio>

    <button onclick="toggleMusic()">Play / Pause</button> --}}


    <audio autoplay id="bgMusic" loop>
        {{-- <source src="{{ asset('music/Ed Sheeran - Perfect.mp3') }}" type="audio/mpeg"> --}}
        <source src="{{ asset('music/Justin Bieber - GO BABY.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>


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
            <div class="font-noto-sans title2 mt-4">JO & Michael</div>
        </div>
    </div>

    <div class="py-5"></div>

    <div class="position-relative">
        <img src="{{ asset('images/bunga-kiri.png') }}" class="flower flower-left" alt="Bunga Kiri" class="bunga-kiri">

        <div class="container col-7 animate-on-scroll slide-in-left">
            <div class="font-noto-sans groom-name">JO</div>
            <div class="font-playfair-display groom-name-detail">The first child of</div>
            <div class="font-playfair-display groom-name-detail">Mr. JO's father &</div>
            <div class="font-playfair-display groom-name-detail">Mrs. JO's mother</div>
        </div>

        <div class="py-2 text-center">
            <div class="font-euphoria-script">&</div>
        </div>

        <div class="container col-7 text-end animate-on-scroll slide-in-right">
            <div class="font-noto-sans groom-name">Michael</div>
            <div class="font-playfair-display groom-name-detail">The first child of</div>
            <div class="font-playfair-display groom-name-detail">Mr. Michael's father</div>
            <div class="font-playfair-display groom-name-detail">& Mrs. Michael's mother</div>
        </div>

        <img src="{{ asset('images/bunga-kanan.png') }}" class="flower flower-right" alt="Bunga Kanan" class="bunga-kanan">
    </div>

    <div class="py-5"></div>

    <img src="{{ asset('images/image2(edited1).jpg') }}" class="img-fluid" alt="Foto Pasangan">

    <div class="py-5"></div>

    <div class="text-center animate-on-scroll slide-in-top">
        <div class="font-noto-sans date-title pb-4">Date & Time</div>
        <div class="font-playfair-display date fw-bold">Saturday, 6th Sept 2025</div>
        <div class="font-playfair-display date">10:00 AM</div>
    </div>

    <div class="py-5"></div>

    <div class="text-center animate-on-scroll slide-in-top">
        <div class="font-noto-sans location-title pb-4">Location</div>
        <div class="mapouter mx-auto d-block mb-4">
            <div class="gmap_canvas">
                <iframe width="100%" height="100%" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=tristar+resta&t=&z=14&ie=UTF8&iwloc=&output=embed" frameborder="0"
                    scrolling="no" marginheight="0" marginwidth="0">
                </iframe>
                <a href="https://online-timer.me/">online timer</a><br><a href="https://www.alarm-clock.net/"></a><br>
                {{-- <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 500px;
                        width: 500px;
                    }
                </style><a href="https://www.mapembed.net">google map net</a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 500px;
                        width: 500px;
                    }
                </style> --}}
            </div>
        </div>
        <div class="font-playfair-display location fw-bold">Tristar Restaurant Surabaya</div>
        <div class="font-playfair-display location">Jl. Ps. Besar Wetan No.20, Alun-alun Contong</div>
        <div class="font-playfair-display location">Kec. Bubutan, Surabaya</div>

        <a class="btn btn-secondary my-5" href="https://maps.app.goo.gl/QL8vf38W6QNEk8858" target="_blank">View Location</a>
    </div>

    <div class="py-5"></div>

    {{-- <div class="text-center animate-on-scroll slide-in-top">
        <div class="font-noto-sans dresscode-title pb-4">Dress Code</div>
        <div class="font-playfair-display dresscode fw-bold">Batik Attire</div>
        <div class="font-playfair-display dresscode">Black Trouser / Skirt</div>
        <div class="font-playfair-display dresscode">Formal Shoes</div>
    </div> --}}

    <div class="py-5"></div>

    <div class="col-7 p-4 bg-light rounded shadow-sm animate-on-scroll slide-in-bottom" style="max-width: 500px; margin: auto;">
        <form action="{{ route('submit') }}" method="POST">
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
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Your full name" required>
            </div>

            <div id="optional-fields" style="display: none;">
                <!-- Number of Guests -->
                <div class="mb-4">
                    <label for="number_of_guests" class="font-playfair-display rsvp fw-bold mb-2">Number of Guest(s)</label>
                    <select class="form-select" id="number_of_guests" name="number_of_guests" required>
                        <option value="1" selected>1 Guest</option>
                        <option value="2">2 Guests</option>
                    </select>
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

    <!-- Modal -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel"
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
            const yesRadio = document.getElementById('yes');
            const noRadio = document.getElementById('no');
            const optionalFields = document.getElementById('optional-fields');

            function toggleOptionalFields() {
                if (yesRadio.checked) {
                    optionalFields.style.display = 'block';
                    optionalFields.querySelectorAll('select, input').forEach(el => el.required = true);
                } else {
                    optionalFields.style.display = 'none';
                    optionalFields.querySelectorAll('select, input').forEach(el => el.required = false);
                }
            }

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
    </script>
</body>
</html>
