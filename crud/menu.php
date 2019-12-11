<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Logotipo e lista de menu burger para celulares -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">CRUD</a>
    </div>

    <!-- links de navegação e menus combinados -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Departamentos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="listar-departamentos.php">Listar</a></li>
            <li><a href="form-departamentos.php">Inserir</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Funcionários <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="listar-funcionarios.php">Listar</a></li>
            <li><a href="form-funcionarios.php">Inserir</a></li>
          </ul>
        </li>



      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>