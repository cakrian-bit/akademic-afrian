<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            /* Tema Nordic Soft-Mode (Warna Pas, Nyaman di Mata) */
            --bg-global: #1e2022;    
            --bg-card: #2d3135;      
            --border-color: #40444b; 
            --primary-text: #f3f4f6; 
            --secondary-text: #9ca3af; 
            
            /* Palet Warna Aksen */
            --accent: #38bdf8;       
            --accent-hover: #0ea5e9;
            --danger: #f87171;       
            --danger-hover: #ef4444;
            --warning: #fbbf24;      
            --warning-hover: #f59e0b;
            --muted-btn: #4b5563;    
            --muted-btn-hover: #374151;
        }

        body { 
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, Roboto, sans-serif; 
            background-color: var(--bg-global); 
            color: var(--primary-text); 
            margin: 0; 
            padding: 0; 
            -webkit-font-smoothing: antialiased;
        }
        
        /* Navbar Style */
        .navbar { 
            background-color: #181a1b; 
            padding: 14px 40px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            border-bottom: 1px solid var(--border-color);
        }
        
        /* Logo Utama Aplikasi */
        .brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #ffffff;
            text-decoration: none;
        }
        .brand-logo h1 { 
            margin: 0; 
            font-size: 18px; 
            letter-spacing: 0.8px; 
            font-weight: 700;
        }
        
        /* Nav Links Linkage dengan Ikon */
        .nav-links { display: flex; gap: 8px; }
        .nav-links a { 
            color: var(--secondary-text); 
            text-decoration: none; 
            font-weight: 600; 
            padding: 8px 16px; 
            border-radius: 8px; 
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1); 
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 8px; /* Jarak antara logo icon dengan teks */
        }
        .nav-links a svg {
            width: 16px;
            height: 16px;
            fill: none;
            stroke: currentColor; /* Menyesuaikan warna dengan teks secara otomatis */
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            transition: transform 0.2s ease;
        }
        .nav-links a:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.05);
        }
        .nav-links a:hover svg {
            transform: translateY(-1px); /* Efek gerak mikro saat di-hover */
        }
        .nav-links a.active { 
            background-color: var(--accent); 
            color: #111827; 
        }
        
        /* Container Layout Card */
        .container { 
            max-width: 1100px; 
            margin: 40px auto; 
            padding: 35px; 
            background: var(--bg-card); 
            border-radius: 14px; 
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.4);
        }
        h2 { 
            border-bottom: 1px solid var(--border-color); 
            padding-bottom: 16px; 
            margin-top: 0; 
            color: #ffffff; 
            font-size: 21px;
            font-weight: 600;
            letter-spacing: -0.3px;
        }
        
        /* Table Style Modern Soft Dark */
        table { width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 20px; }
        th, td { padding: 14px 18px; text-align: left; font-size: 14px; }
        th { 
            background-color: #222527; 
            color: var(--secondary-text); 
            font-weight: 600; 
            text-transform: uppercase; 
            font-size: 11px; 
            letter-spacing: 0.8px;
            border-bottom: 2px solid var(--border-color);
        }
        td { 
            color: #e5e7eb; 
            border-bottom: 1px solid var(--border-color);
            background-color: var(--bg-card);
        }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background-color: #353a3f; }
        
        /* Buttons Aesthetic */
        .btn { 
            padding: 8px 16px; 
            text-decoration: none; 
            border-radius: 8px; 
            font-size: 12px; 
            font-weight: 600; 
            display: inline-flex; 
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease; 
            cursor: pointer; 
            border: none;
            letter-spacing: 0.3px;
        }
        .btn-add { background: var(--accent); color: #111827; margin-bottom: 20px; box-shadow: 0 4px 12px rgba(56, 189, 248, 0.2); }
        .btn-add:hover { background: var(--accent-hover); transform: translateY(-1px); }
        .btn-edit { background: var(--warning); color: #111827; margin-right: 4px; }
        .btn-edit:hover { background: var(--warning-hover); }
        .btn-delete { background: var(--danger); color: #ffffff; margin-right: 4px; }
        .btn-delete:hover { background: var(--danger-hover); }
        .btn-detail { background: var(--muted-btn); color: #ffffff; }
        .btn-detail:hover { background: var(--muted-btn-hover); }
        
        /* Form Inputs Style Modern */
        input[type="text"], select {
            width: 100%; 
            padding: 11px 14px; 
            background-color: #1e2022; 
            border: 1px solid var(--border-color); 
            border-radius: 8px; 
            color: #ffffff;
            font-size: 14px;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }
        input[type="text"]:focus, select:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.15);
        }
        
        /* Profile Layout Card */
        .profile-card { 
            display: flex; 
            gap: 30px; 
            align-items: center; 
            background: #181a1b; 
            padding: 24px; 
            border-radius: 12px; 
            margin-top: 15px;
            border: 1px solid var(--border-color);
        }
        .profile-img { 
            width: 125px; 
            height: 160px; 
            object-fit: cover; 
            border-radius: 8px; 
            border: 2px solid var(--border-color); 
            box-shadow: 0 4px 12px rgba(0,0,0,0.4); 
        }
        .profile-info table { margin: 0; }
        .profile-info td { border: none; padding: 6px 12px; font-size: 14px; background: transparent; }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php" class="brand-logo">
            <svg style="width:24px; height:24px; stroke:var(--accent); stroke-width:2;" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                <path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"/>
            </svg>
            <h1>MANAJEMEN AKADEMIK</h1>
        </a>
        
        <div class="nav-links">
            <a href="index.php" id="nav-beranda">
                <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                Beranda
            </a>
            
            <a href="jurusan.php" id="nav-jurusan">
                <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                Data Jurusan
            </a>
            
            <a href="mahasiswa.php" id="nav-mahasiswa">
                <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                Data Mahasiswa
            </a>
        </div>
    </div>