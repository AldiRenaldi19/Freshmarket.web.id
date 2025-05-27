<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Order Success</title>
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
        }
        .container {
            background: #fff;
            padding: 3rem 4rem;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            text-align: center;
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
            margin-bottom: 2.5rem;
            color: #34495e;
        }
        .btn {
            background-color: #2980b9;
            color: white;
            padding: 0.75rem 1.75rem;
            font-size: 1.1rem;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(41, 128, 185, 0.4);
        }
        .btn:hover {
            background-color: #1c5980;
            box-shadow: 0 6px 16px rgba(28, 89, 128, 0.6);
        }
        .btn + .btn {
            margin-left: 1rem;
            background-color: #27ae60;
            box-shadow: 0 4px 8px rgba(39, 174, 96, 0.4);
        }
        .btn + .btn:hover {
            background-color: #1e8449;
            box-shadow: 0 6px 16px rgba(30, 132, 73, 0.6);
        }
    </style>
</head>
<body>
    <div class="container" role="main">
        <h1>Pesanan Berhasil!</h1>
        <p>Terima kasih sudah melakukan pemesanan. Pesanan Anda telah kami terima dan sedang diproses.</p>
        <a href="/" class="btn" aria-label="Kembali ke Beranda">Kembali ke Beranda</a>
        <a href="/checkout" class="btn" aria-label="Lihat Pesanan Saya">Lihat Pesanan Saya</a>
    </div>
</body>
</html>