@extends('layouts.app')

@section('content')
<style>
      html, body {
         height: 100%;
         margin: 0;
         padding: 0;
         overflow: hidden; /* Evita lo scroll non voluto */
     }

     #background {
         position: fixed;
         top: 0;
         left: 0;
         width: 100vw;
         height: 100vh;
         object-fit: cover;
         z-index: -1; /* Manda l'immagine dietro i contenuti */
     }

    .flip-card {
        perspective: 1000px;
        width: 300px;
        height: 400px;
    }

    .flip-card-form {
        background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%);
        color: white;
        display: flex;
        perspective: 1000px;
        width: 300px;
        height: 150px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 24px;
        font-weight: bold;
        position: relative;
        display: inline-block;
    }

    h1::before {
        content: "[ ";
        margin-right: 5px;
    }

    h1::after {
        content: " ]";
        margin-left: 5px;
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.8s;
        transform-style: preserve-3d;
    }

    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .flip-card-front {
        background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .flip-card-back {
        background: linear-gradient(45deg, #ee9ca7 0%, #ffdde1 100%);
        color: #333;
        transform: rotateY(180deg);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .profile-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid rgba(0, 0, 0, 0.3);
        margin-bottom: 20px;
    }

    .social-icons a {
        color: #333;
        margin: 0 10px;
        font-size: 24px;
        transition: transform 0.3s ease;
    }

    .social-icons a:hover {
        transform: scale(1.2);
    }

    @keyframes wave {
        0% {
            transform: rotate(0deg);
        }

        10% {
            transform: rotate(14deg);
        }

        20% {
            transform: rotate(-8deg);
        }

        30% {
            transform: rotate(14deg);
        }

        40% {
            transform: rotate(-4deg);
        }

        50% {
            transform: rotate(10deg);
        }

        60% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }

    .waving-hand {
        display: inline-block;
        animation: wave 2.5s infinite;
        transform-origin: 70% 70%;
    }
</style>
<div class="relative h-screen w-screen">

    <div class="relative h-screen w-screen">
        <img id="background" class="absolute top-0 left-0 w-full h-full object-cover"
        src="{{ Storage::disk('s3')->url('img/background.svg') }}" alt="SS3Laravel background" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

        @if (session('success'))
            <div class="d-flex justify-content-center">
                <div class="mt-4 alert alert-success d-flex justify-content-between align-items-center"
                    style="width:400px; border: 2px solid red;">
                    {!! session('success') !!}
                    <!-- Bottone per rimuovere il messaggio -->
                    <button id="close-message" class="btn btn-danger btn-sm ml-5">Clear</button>
                </div>
            </div>
        @endif

    </div>
    <div class="container py-5">
        <div class="row justify-content-center">

            <div class="col-md-6">

                @if (!auth()->user()->profile_image)
                    <div class="flip-card-form  mx-auto mb-3">
                        <div class="flip-card-form mx-auto mb-3">
                            <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Specifica che la richiesta sarà di tipo PUT -->

                                <div class="form-group">
                                    <label class="ms-5 mt-2 mb-2" for="profile_image">Carica la tua immagine</label>
                                    <input type="file" class="form-control" name="profile_image" id="profile_image"
                                        required>
                                </div>

                                <div class="text-center mt-3">
                                    <button class="btn btn-light" type="submit">Carica</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

                <div class="flip-card mx-auto">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            @if (auth()->user()->profile_image)
                                <img src="{{ Storage::disk('s3')->url(auth()->user()->profile_image) }}" alt="Team Member"
                                    class="profile-img">
                            @endif
                            <p>Benvenuto</p>
                            <h1 class="mt-2">{{ Auth::user()->name }}</h1>

                            <p class="mt-3">
                                <span class="waving-hand">👋</span>Passa il mouse sopra la card per saperne di più!!
                            </p>
                        </div>
                        <div class="flip-card-back">
                            <h3>About Author</h3>
                            <p>I'm passionate about creating beautiful and functional websites. With 5 years of
                                experience,
                                I specialize in front-end development and UX design.</p>
                            <div class="social-icons mt-4">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-github"></i></a>
                            </div>
                            <p class="mt-3">
                                <span class="waving-hand">👋</span> Passa il mouse fuori dalla card per tornare
                                indietro. !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</div>
<script>
    document.getElementById('close-message').addEventListener('click', function () {
        // Nasconde il messaggio di successo
        this.parentElement.remove();
        // Ricarica la pagina
        location.reload();
    });
</script>
@endsection
