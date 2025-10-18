<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Berhasil</title>
    <meta http-equiv="refresh" content="3;url=/dashboard">
    <style>
        /* === STYLE UTAMA === */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: #fff;
        }

        .success-box {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 40px 60px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            animation: fadeIn 0.8s ease-out;
        }

        .success-box h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: #bbf7d0;
        }

        .success-box p {
            font-size: 1rem;
            color: #f1f5f9;
            margin-bottom: 20px;
        }

        .loader {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid #22c55e;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin: 10px auto;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            100% { transform: rotate(360deg); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .note {
            font-size: 0.9rem;
            color: #e0e7ff;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="success-box">
        <h1>✅ Pendaftaran Berhasil!</h1>
        <p>Data Anda telah berhasil disimpan.</p>
        <div class="loader"></div>
        <p class="note">Anda akan diarahkan ke dashboard dalam 3 detik...</p>
    </div>
</body>
</html>
