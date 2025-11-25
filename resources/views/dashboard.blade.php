<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        /* Modern Dashboard Styles */
        .dashboard-container {
            padding: 2rem 0;
        }
        
        /* Welcome Section */
        .welcome-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            color: white;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
            animation: slideInDown 0.6s ease-out;
        }
        
        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .welcome-card::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .welcome-content {
            position: relative;
            z-index: 2;
        }
        
        .welcome-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }
        
        .welcome-subtitle {
            font-size: 1.1rem;
            opacity: 0.95;
        }
        
        .user-badge {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            font-weight: 600;
            margin-top: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.6s ease-out backwards;
        }
        
        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--card-gradient);
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 1.5rem;
            background: var(--card-gradient);
            box-shadow: 0 8px 20px var(--card-shadow);
        }
        
        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 0.5rem;
            line-height: 1;
        }
        
        .stat-label {
            font-size: 1rem;
            color: #718096;
            font-weight: 600;
        }
        
        /* Quick Actions */
        .quick-actions {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .section-title i {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }
        
        .action-btn {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.25rem;
            background: #f8f9fa;
            border-radius: 15px;
            text-decoration: none;
            color: #2d3748;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .action-btn:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-color: #667eea;
            transform: translateX(5px);
            color: #667eea;
        }
        
        .action-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }
        
        /* Recent Activity */
        .activity-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }
        
        .activity-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
        }
        
        .activity-item:hover {
            background: #f8f9fa;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));
            color: #667eea;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .activity-content {
            flex-grow: 1;
        }
        
        .activity-title {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.25rem;
        }
        
        .activity-time {
            font-size: 0.85rem;
            color: #718096;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .welcome-card {
                padding: 2rem 1.5rem;
            }
            
            .welcome-title {
                font-size: 1.5rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
            
            .quick-actions,
            .activity-card {
                padding: 1.5rem;
            }
        }
        
        /* Dark mode support */
        .dark .stat-card,
        .dark .quick-actions,
        .dark .activity-card {
            background: #1f2937;
        }
        
        .dark .stat-value,
        .dark .activity-title {
            color: #f9fafb;
        }
        
        .dark .action-btn {
            background: #374151;
            color: #f9fafb;
        }
        
        .dark .action-btn:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));
        }
        
        .dark .activity-item:hover {
            background: #374151;
        }
    </style>

    <div class="dashboard-container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Card -->
            <div class="welcome-card">
                <div class="welcome-content">
                    <h1 class="welcome-title">
                        <i class="bi bi-emoji-smile"></i> Selamat Datang, {{ Auth::user()->name }}!
                    </h1>
                    <p class="welcome-subtitle">
                        Kelola sistem informasi RW Anda dengan mudah dan efisien
                    </p>
                    @if (Auth::user()->isAdmin())
                        <span class="user-badge">
                            <i class="bi bi-shield-check me-2"></i>Administrator
                        </span>
                    @else
                        <span class="user-badge">
                            <i class="bi bi-person-check me-2"></i>User
                        </span>
                    @endif
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card" style="--card-gradient: linear-gradient(135deg, #667eea, #764ba2); --card-shadow: rgba(102, 126, 234, 0.3);">
                    <div class="stat-icon">
                        <i class="bi bi-newspaper"></i>
                    </div>
                    <div class="stat-value">0</div>
                    <div class="stat-label">Total Berita</div>
                </div>
                
                <div class="stat-card" style="--card-gradient: linear-gradient(135deg, #f093fb, #f5576c); --card-shadow: rgba(240, 147, 251, 0.3);">
                    <div class="stat-icon">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                    <div class="stat-value">0</div>
                    <div class="stat-label">Agenda Aktif</div>
                </div>
                
                <div class="stat-card" style="--card-gradient: linear-gradient(135deg, #4facfe, #00f2fe); --card-shadow: rgba(79, 172, 254, 0.3);">
                    <div class="stat-icon">
                        <i class="bi bi-images"></i>
                    </div>
                    <div class="stat-value">0</div>
                    <div class="stat-label">Foto Galeri</div>
                </div>
                
                <div class="stat-card" style="--card-gradient: linear-gradient(135deg, #43e97b, #38f9d7); --card-shadow: rgba(67, 233, 123, 0.3);">
                    <div class="stat-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="stat-value">0</div>
                    <div class="stat-label">Pengurus</div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Quick Actions -->
                <div class="col-lg-8">
                    <div class="quick-actions">
                        <h3 class="section-title">
                            <i class="bi bi-lightning-charge-fill"></i>
                            Aksi Cepat
                        </h3>
                        <div class="actions-grid">
                            <a href="{{ route('admin.berita.create') }}" class="action-btn">
                                <div class="action-icon">
                                    <i class="bi bi-plus-lg"></i>
                                </div>
                                <span>Tambah Berita</span>
                            </a>
                            <a href="{{ route('admin.agenda.create') }}" class="action-btn">
                                <div class="action-icon">
                                    <i class="bi bi-calendar-plus"></i>
                                </div>
                                <span>Tambah Agenda</span>
                            </a>
                            <a href="{{ route('admin.galeri.create') }}" class="action-btn">
                                <div class="action-icon">
                                    <i class="bi bi-image"></i>
                                </div>
                                <span>Upload Foto</span>
                            </a>
                            <a href="{{ route('admin.struktur.create') }}" class="action-btn">
                                <div class="action-icon">
                                    <i class="bi bi-person-plus"></i>
                                </div>
                                <span>Tambah Pengurus</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="col-lg-4">
                    <div class="activity-card">
                        <h3 class="section-title">
                            <i class="bi bi-clock-history"></i>
                            Aktivitas Terbaru
                        </h3>
                        
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Sistem Siap Digunakan</div>
                                <div class="activity-time">Baru saja</div>
                            </div>
                        </div>
                        
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="bi bi-person-check"></i>
                            </div>
                            <div class="activity-content">
                                <div class="activity-title">Login Berhasil</div>
                                <div class="activity-time">{{ now()->diffForHumans() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
