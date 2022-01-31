  <p>

    <!-- ICONES -->
    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target=".modal-icones">
      <i class="fa fa-question-circle"></i> Font Awesome
    </button>

    <!-- COLUNAS -->
    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target=".modal-grid">
      <i class="fa fa-question-circle"></i> Colunas
    </button>

    <!-- Botoes -->
    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target=".modal-botoes">
      <i class="fa fa-question-circle"></i> Botões
    </button>

    <!-- CORES -->
    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target=".modal-cores">
      <i class="fa fa-question-circle"></i> Plano de Fundo
    </button>

    <!-- ESPACAMENTO -->
    <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target=".modal-espaco">
      <i class="fa fa-question-circle"></i> Margens
    </button>

    <div class="modal fade modal-icones" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="m-3">
            <? include('assets/tinymce-4.6.5/lista-icones.php'); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade modal-grid" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="m-3">
            <? include('assets/tinymce-4.6.5/lista-grid.php'); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade modal-botoes" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="m-3">
            <? include('assets/tinymce-4.6.5/lista-botoes.php'); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade modal-cores" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="m-3">
            <? include('assets/tinymce-4.6.5/lista-cores.php'); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade modal-espaco" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="m-3">
            <? include('assets/tinymce-4.6.5/lista-espaco.php'); ?>
          </div>
        </div>
      </div>
    </div>

  </p>