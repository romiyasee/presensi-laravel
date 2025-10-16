<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Pegawai</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Decorative Background Elements */
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 15s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* Enhanced Header Section */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .header-left {
            flex: 1;
        }

        .header-left h3 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .header-icon i {
            color: white;
            font-size: 24px;
        }

        .welcome-text {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #6c757d;
            font-size: 18px;
        }

        .user-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .user-badge i {
            font-size: 18px;
        }

        .header-right {
            display: flex;
            align-items: center;
        }

        .header-date {
            text-align: right;
        }

        .header-date .day {
            font-size: 14px;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header-date .date-large {
            font-size: 32px;
            font-weight: 700;
            color: #667eea;
            line-height: 1;
        }

        /* Enhanced Button Section */
        .button-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .presensi-form {
            display: contents;
        }

        .btn-presensi {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 2px solid transparent;
            border-radius: 20px;
            padding: 40px 30px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            font-size: 20px;
            font-weight: 700;
            position: relative;
            overflow: hidden;
        }

        .btn-presensi::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .btn-presensi:hover::before {
            left: 100%;
        }

        .btn-presensi:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .btn-masuk {
            color: #667eea;
            border-color: rgba(102, 126, 234, 0.2);
        }

        .btn-masuk:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-color: transparent;
        }

        .btn-masuk .icon-wrapper {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-masuk:hover .icon-wrapper {
            background: white;
            transform: rotate(360deg);
        }

        .btn-masuk .icon-wrapper i {
            font-size: 35px;
            color: white;
        }

        .btn-masuk:hover .icon-wrapper i {
            color: #667eea;
        }

        .btn-pulang {
            color: #f093fb;
            border-color: rgba(240, 147, 251, 0.2);
        }

        .btn-pulang:hover {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border-color: transparent;
        }

        .btn-pulang .icon-wrapper {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(240, 147, 251, 0.4);
        }

        .btn-pulang:hover .icon-wrapper {
            background: white;
            transform: rotate(360deg);
        }

        .btn-pulang .icon-wrapper i {
            font-size: 35px;
            color: white;
        }

        .btn-pulang:hover .icon-wrapper i {
            color: #f093fb;
        }

        /* Enhanced Table Section */
        .table-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            margin-bottom: 25px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .table-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f1f3f5;
        }

        .table-header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .table-header-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .table-header-icon i {
            color: white;
            font-size: 22px;
        }

        .table-header h4 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 26px;
            font-weight: 800;
        }

        .table-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 15px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        th {
            color: white;
            padding: 18px 20px;
            text-align: left;
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
        }

        th i {
            margin-right: 8px;
        }

        th:first-child {
            border-top-left-radius: 12px;
        }

        th:last-child {
            border-top-right-radius: 12px;
        }

        td {
            padding: 18px 20px;
            color: #2d3436;
            font-size: 15px;
            font-weight: 500;
            border-bottom: 1px solid #f1f3f5;
            background: white;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            transform: scale(1.01);
        }

        tbody tr:hover td {
            background: transparent;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:last-child td:first-child {
            border-bottom-left-radius: 12px;
        }

        tbody tr:last-child td:last-child {
            border-bottom-right-radius: 12px;
        }

        /* Time Badge in Table */
        .time-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
            padding: 6px 14px;
            border-radius: 20px;
            color: #667eea;
            font-weight: 600;
        }

        .time-badge i {
            font-size: 12px;
        }

        /* Enhanced Logout Button */
        .logout-container {
            display: flex;
            justify-content: flex-end;
        }

        .btn-logout {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            color: #dc3545;
            border: 2px solid #dc3545;
            padding: 14px 35px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(220, 53, 69, 0.25);
            font-size: 16px;
        }

        .btn-logout:hover {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(220, 53, 69, 0.4);
        }

        .btn-logout i {
            font-size: 18px;
        }

        /* Enhanced Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 40px;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 80px;
            color: #dee2e6;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-state p {
            font-size: 18px;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }

            .header-left h3 {
                font-size: 28px;
                justify-content: center;
            }

            .header-right {
                width: 100%;
                justify-content: center;
            }

            .header-date {
                text-align: center;
            }

            .button-container {
                grid-template-columns: 1fr;
            }

            .table-header {
                flex-direction: column;
                gap: 15px;
            }

            table {
                font-size: 13px;
            }

            th, td {
                padding: 12px 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Enhanced Header -->
        <div class="header">
            <div class="header-content">
                <div class="header-left">
                    <h3>
                        <div class="header-icon">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        Sistem Presensi
                    </h3>
                    <div class="welcome-text">
                        <span>Selamat datang,</span>
                        <div class="user-badge">
                            <i class="fas fa-user-circle"></i>
                            {{ $pegawai->nama }}
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-date">
                        <div class="day">Hari Ini</div>
                        <div class="date-large">{{ date('d/m/Y') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button Presensi -->
        <div class="button-container">
            <form action="/presensi/masuk" method="POST" class="presensi-form">
                @csrf
                <button type="submit" class="btn-presensi btn-masuk">
                    <div class="icon-wrapper">
                        <i class="fas fa-sign-in-alt"></i>
                    </div>
                    MASUK
                </button>
            </form>

            <form action="/presensi/pulang" method="POST" class="presensi-form">
                @csrf
                <button type="submit" class="btn-presensi btn-pulang">
                    <div class="icon-wrapper">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    PULANG
                </button>
            </form>
        </div>

        <!-- Enhanced Data Presensi -->
        <div class="table-container">
            <div class="table-header">
                <div class="table-header-left">
                    <div class="table-header-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <h4>Riwayat Presensi</h4>
                </div>
                @if(count($data) > 0)
                <div class="table-badge">
                    {{ count($data) }} Record
                </div>
                @endif
            </div>

            @if(count($data) > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th><i class="fas fa-calendar-alt"></i> Tanggal</th>
                            <th><i class="fas fa-arrow-right"></i> Jam Masuk</th>
                            <th><i class="fas fa-arrow-left"></i> Jam Pulang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $p)
                        <tr>
                            <td><strong>{{ $p->tanggal }}</strong></td>
                            <td>
                                <span class="time-badge">
                                    <i class="fas fa-clock"></i>
                                    {{ $p->jam_masuk ?? '-' }}
                                </span>
                            </td>
                            <td>
                                <span class="time-badge">
                                    <i class="fas fa-clock"></i>
                                    {{ $p->jam_pulang ?? '-' }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <i class="fas fa-inbox"></i>
                <p>Belum ada data presensi</p>
            </div>
            @endif
        </div>

        <!-- Logout -->
        <div class="logout-container">
            <a href="/logout" class="btn-logout">
                <i class="fas fa-power-off"></i>
                Logout
            </a>
        </div>
    </div>
</body>
</html>