<div class="col-mb-12">
  <nav aria-label="...">
    <ul class="pagination justify-content-center">

      <li class="page-item disabled">
        <?php
        if ($pagina > 1) {
          echo '<li class="page-item active"><a class="page-link" href="./?pag=' . ($pagina - 1) . '">Anterior</a></li>
             ';
        } ?>
      </li>

      <?php for ($i = 1; $i <= $pags; $i++) {
        if ($i == $pagina)
          echo '<li class="page-item active"><a class="page-link" href="./?pag=' . $i . '">' . $i . '</a></li>';
        else
          echo '<li class="page-item"><a class="page-link" href="./?pag=' . $i . '">' . $i . '</a></li>';
      }
      ?>

      <li class="page-item">
        <?php
        if ($pagina < $pags) {
          echo '<a class="page-link" href="./?pag=' . ($pagina + 1) . '">Próximo</a>';
        }  ?>
      </li>
    </ul>
  </nav>
</div>