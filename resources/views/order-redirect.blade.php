<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pesanan Berhasil - Pengalihan</title>
    <style>
        body {
            background: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #2c3e50;
            text-align: center;
        }
        .container {
            background: #fff;
            padding: 3rem 4rem;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 90%;
        }
        h1 {
            font-size: 2.8rem;
            color: #27ae60;
            margin-bottom: 1rem;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: #34495e;
        }
        .countdown {
            font-weight: bold;
            color: #2980b9;
            margin-bottom: 2rem;
            font-size: 1.4rem;
        }
        a {
            color: #2980b9;
            text-decoration: none;
            font-weight: 600;
            border: 2px solid #2980b9;
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            transition: background-color 0.3s ease, color 0.3s ease;
            display: inline-block;
        }
        a:hover {
            background-color: #2980b9;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container" role="main">
        <h1>Pesanan Berhasil!</h1>
        <p>Terima kasih sudah melakukan pemesanan. Anda akan diarahkan segera.</p>
        <p class="countdown">Mengalihkan dalam <span id="seconds">5</span> detik...</p>
        <p>Jika Anda tidak dialihkan secara otomatis, klik <a href="/">di sini</a> untuk kembali ke beranda.</p>
    </div>
    <script>
        // Redirect target URL
        const redirectUrl = "/";

        let seconds = 5;
        const secondsSpan = document.getElementById('seconds');

        const countdownInterval = setInterval(() => {
            seconds--;
            if (seconds <= 0) {
                clearInterval(countdownInterval);
                window.location.href = redirectUrl;
            } else {
                secondsSpan.textContent = seconds;
            }
        }, 1000);
    </script>
</body>
</html>