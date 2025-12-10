<?php

function isAuthenticated()
{
  return isset($_SESSION['user']);
}

function isAdmin()
{
  return isAuthenticated() && $_SESSION['user']['role'] === 'admin';
}

function isSeller()
{
  return isAuthenticated() && $_SESSION['user']['role'] === 'seller';
}

function requireAuth()
{
  session_start();
  if (!isAuthenticated()) {
    header("Location: " . BASE_URL . "/auth/login");
    exit;
  }
}

function requireAdmin()
{
  session_start();
  if (!isAdmin()) {
    header("Location: " . BASE_URL . "/home");
    exit;
  }
}

function requireSeller()
{
  session_start();
  if (!isSeller()) {
    header("Location: " . BASE_URL . "/home");
    exit;
  }
}
