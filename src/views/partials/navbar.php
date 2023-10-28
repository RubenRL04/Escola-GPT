<?php

$navbarTraduction = [
  "es" => ["Inicio", "Matrícula", "Calificaciones", "Ajustes", "Perfil", "Cerrar sesión", "Configuración"],
  "en" => ["Dashboard", "Enrollment", "Grades", "Settings", "Profile", "Logout", "Settings"],
  "cat" => ["Inici", "Matrícula", "Qualificacions", "Ajustaments", "Perfil", "Tancar sessió", "Configuració"]
];

?>

<style>
    .dropdown-menu a.dropdown-item:hover {
        background-color: transparent; 
        color: black; 
    }
</style>

<nav class="navbar navbar-expand-md bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand text-white fw-bold" href="/dashboard">Escola ChatGPT</a>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item <?php echo isActivePage('/dashboard'); ?>">
          <a class="nav-link text-white" href="/dashboard"><?=  $navbarTraduction[$_COOKIE['language']][0] ?></a>
        </li>
        <li class="nav-item <?php echo isActivePage('/enrollment'); ?>">
          <a class="nav-link text-white" href="/enrollment"><?=  $navbarTraduction[$_COOKIE['language']][1] ?></a>
        </li>
        <li class="nav-item <?php echo isActivePage('/grades'); ?>">
          <a class="nav-link text-white" href="/grades"><?=  $navbarTraduction[$_COOKIE['language']][2] ?></a>
        </li>
        <li class="nav-item dropdown d-lg-none">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <?=  $navbarTraduction[$_COOKIE['language']][6] ?>
          </a>
          <ul class="dropdown-menu bg-primary d-lg-none">
            <li><a class="dropdown-item text-white <?php echo isActivePage('/settings'); ?>" href="/settings"><i class="fas fa-cog"></i><?=  $navbarTraduction[$_COOKIE['language']][3] ?></a></li>
            <li><a class="dropdown-item text-white <?php echo isActivePage('/profile'); ?>" href="/profile"><i class="fas fa-user"></i><?=  $navbarTraduction[$_COOKIE['language']][4] ?></a></li>
            <li><a class="dropdown-item text-white" href="/logout"><i class="fa-solid fa-right-from-bracket"></i><?= $navbarTraduction[$_COOKIE['language']][5] ?></a></li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="gap-3 d-none d-lg-flex">
      <a class="dropdown-item text-white" href="/settings" title="Configuración"><i class="fas fa-cog"></i></a>
      <a class="dropdown-item text-white" href="/profile" title="Perfil"><i class="fas fa-user"></i></a>
      <a class="dropdown-item text-white" href="/logout" title="Cerrar sesión"><i class="fa-solid fa-right-from-bracket"></i></a>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<?php
function isActivePage($page)
{
  if ($_SERVER['REQUEST_URI'] === $page) {
    return 'active fw-bold';
  }
  return '';
}
?>