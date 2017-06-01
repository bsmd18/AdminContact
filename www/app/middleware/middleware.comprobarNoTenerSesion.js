function middlewareComprobarNoTenerSesion($this, $localStorage, $sessionStorage, rolAdmin) {
  if (typeof $sessionStorage.usuario == "undefined") {
    $this.next();
  } else {
    if ($sessionStorage.usuario.rol_id == rolAdmin) {
      $this.redirectTo('/registrarContacto');
    } else {
      $this.redirectTo('/menuPrincipal');
    }
  }
}