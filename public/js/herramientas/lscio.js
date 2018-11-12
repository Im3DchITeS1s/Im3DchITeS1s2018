function inhabilitar()
{
    swal("Advertencia", "Permisos Insuficientes", "warning");
	return false
}

document.oncontextmenu=inhabilitar
document.onkeydown=inhabilitar

