<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <title><?= isset($title) ? htmlspecialchars($title) : 'BeliLokal' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    * {
      font-family: 'Inter', sans-serif;
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: radial-gradient(circle at 20% 50%, rgba(59, 130, 246, 0.25) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(37, 99, 235, 0.25) 0%, transparent 50%);
      pointer-events: none;
      z-index: 0;
    }

    .glass-effect {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 0 8px 32px 0 rgba(30, 58, 138, 0.3);
    }

    .btn-primary {
      background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
      transition: 0.3s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 20px rgba(59, 130, 246, 0.4);
    }

    .input-modern {
      background: rgba(255, 255, 255, 0.08);
      border: 2px solid rgba(255, 255, 255, 0.15);
      transition: all 0.3s ease;
    }

    .input-modern:focus {
      background: rgba(255, 255, 255, 0.12);
      border-color: rgba(59, 130, 246, 0.6);
      box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
    }

    .nav-link {
      position: relative;
      transition: color 0.3s ease;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -6px;
      left: 50%;
      width: 0;
      height: 2px;
      background: linear-gradient(90deg, #3b82f6, #1d4ed8);
      transform: translateX(-50%);
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 80%;
    }
  </style>
</head>

<body class="text-white bg-gradient-to-br from-blue-500 to-blue-600 relative min-h-screen overflow-x-hidden">
  <nav class="w-full fixed top-0 left-0 right-0 z-50 px-4 py-4">
    <div class="container mx-auto">
      <div class="glass-effect rounded-2xl py-4 px-8 flex items-center justify-between">

        <a href="<?= BASE_URL ?>" class="font-bold text-xl flex items-center gap-2 hover:scale-105 transition-transform">
          <div class="bg-gradient-to-br from-blue-400 to-blue-600 p-2 rounded-xl">
            <i data-lucide="shopping-bag" class="w-6 h-6"></i>
          </div>
          <span class="bg-gradient-to-r from-blue-200 to-blue-300 bg-clip-text text-transparent">BeliLokal</span>
        </a>

        <ul class="flex gap-8 text-sm font-medium">
          <li>
            <a href="<?= BASE_URL ?>" class="nav-link hover:text-blue-200 transition flex items-center gap-2">
              <i data-lucide="home" class="w-4 h-4"></i>
              Home
            </a>
          </li>

          <?php if (!empty($_SESSION['user'])): ?>
            <li>
              <a href="<?= BASE_URL ?>/auth/logout" class="nav-link hover:text-red-300 transition flex items-center gap-2">
                <i data-lucide="log-out" class="w-4 h-4"></i>
                Logout
              </a>
            </li>
          <?php else: ?>
            <li>
              <a href="<?= BASE_URL ?>/auth/login" class="nav-link hover:text-blue-200 transition flex items-center gap-2">
                <i data-lucide="log-in" class="w-4 h-4"></i>
                Login
              </a>
            </li>
          <?php endif; ?>
        </ul>

      </div>
    </div>
  </nav>

  <div class="container mx-auto px-4 pt-28 pb-10 relative z-10">