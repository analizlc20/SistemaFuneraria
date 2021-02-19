
<div class="menu">
            <div class="titulo-funeraria">
                <a href="index.php"><img class="icono-coche" src="img/coche-funebre2.svg" alt="coche-funebre"></a>
                <h1 class="nombre-funeraria">Funeraria "ARIAS"</h1>
            </div>
            <nav class="opciones">
            <?php if($tipo_user == 'administrador'): ?>
                <a href="usuarios.php"><img class="img" src="img/usuario.svg" alt="usuario profile">Usuarios</a>
<!--                 <a href="personal.html"><img class="img" src="img/personal.svg" alt="personal profile">Personal</a> -->
                <a href="servicios.php"><img class="img" src="img/servicios.svg" alt="servicio profile">Servicios</a>
                <a href="clientes.php"><img class="img" src="img/cliente.svg" alt="clientes profile">Clientes</a>
                <a href="difuntos.php"><img class="img" src="img/difunto.svg" alt="difuntos profile">Difuntos</a>
                <a href="proveedores.php"><img class="img" src="img/proveedor.svg" alt="proveedores profile">Proveedores</a>
                <a href="compras.php"><img class="img" src="img/compras.svg" alt="compras profile">Compras</a>
                <a href="ventas.php"><img class="img" src="img/ventas.svg" alt="ventas profile">Ventas</a>
            <?php  elseif($tipo_user == 'personal'): ?>
                
                <a href="servicios.php"><img class="img" src="img/servicios.svg" alt="servicio profile">Servicios</a>
                <a href="clientes.php"><img class="img" src="img/cliente.svg" alt="clientes profile">Clientes</a>
                <a href="difuntos.php"><img class="img" src="img/difunto.svg" alt="difuntos profile">Difuntos</a>
                <a href="ventas.php"><img class="img" src="img/ventas.svg" alt="ventas profile">Ventas</a>
                <a style="height:42.6%; background:#DDAB32;"><img src="" alt=""></a>
                <?php endif; ?>
            </nav>
        </div>