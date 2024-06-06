@extends('welcome')
@section('content')
<style>
     .container-countdown {
            max-width: 600px;
            margin: 200px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .countdown {
            font-size: 24px;
            margin-top: 20px;
        }
</style>
<section class="page">
    <div class="container-countdown text-center">
        <h1>Coming Soon</h1>

     
        <p class="lead">We're working hard to bring you something awesome. Stay tuned!</p>
        {{-- <div class="countdown" id="countdown"></div> --}}
    </div>

    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("June 20, 2024 00:00:00").getTime();

        // Update the countdown every 1 second
        var x = setInterval(function() {

            // Get the current date and time
            var now = new Date().getTime();

            // Calculate the distance between now and the countdown date
            var distance = countDownDate - now;

            // Calculate days, hours, minutes, and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the countdown
            document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // If the countdown is over, display a message
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
</section>
@endsection