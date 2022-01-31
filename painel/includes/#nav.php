


<nav class="navbar navbar-fixed-top navbar-dark d-flex flex-row-reverse fixed-top">
    <div class="mx-3">
        <div class="row d-flex align-items-center">

            <div class="col-md-6">
             <? echo $jsonConf->c_nome; ?> 
         </div>
         <div class="col-md-6">
             <div class="dropdown">
                <button type="button" id="DropConf" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-cog"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-top dropdown-menu-tip-nw dropdown-menu-right" aria-labelledby="DropConf">
                <a class="dropdown-item" href="<?=$url?>!/usuarios/visualizar"><i class="fa fa-user"></i> Usu&aacute;rios</a>
                <? if( $_COOKIE['user_id'] == '1' ){ ?>
                    <a class="dropdown-item" href="<?=$url?>!/configuracao/visualizar"><i class="fa fa-user"></i> Geral</a>
                    <a class="dropdown-item" href="<?=$url?>!/themes/visualizar"><i class="fa fa-th"></i> Themes</a>
                    <div class="dropdown-divider"></div>
                    <p class="dropdown-item disabled m-0">Logos</p>
                    <a class="dropdown-item" href="<?=$url?>!/logo/principal"><i class="fa fa-cloud-upload"></i> Nav</a>
                    <a class="dropdown-item" href="<?=$url?>!/logo/footer"><i class="fa fa-cloud-upload"></i> Footer</a>
                    <a class="dropdown-item" href="<?=$url?>!/logo/favicon"><i class="fa fa-cloud-upload"></i> FavIcon</a>
                    <div class="dropdown-divider"></div>
                    <p class="dropdown-item disabled m-0">Wireframes</p>
                    <a class="dropdown-item" href="<?=$url?>!/wireframes/visualizar"><i class="fa fa-flask fa-fw"></i> P&aacute;ginas</a>
                    <a class="dropdown-item" href="<?=$url?>!/wireframes_vis/visualizar"><i class="fa fa-flask fa-fw"></i> Visualizar</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=$url?>!/email/visualizar"><i class="fa fa-envelope-o fa-fw"></i> Email</a>
                    <div class="dropdown-divider"></div>
                <? } ?>
                <a class="dropdown-item" href="<?=$url?>!/midias/visualizar"><i class="fa fa-share-alt fa-fw"></i> M&iacute;dia</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?=$url?>sair"><i class="fa fa-power-off"></i> Logout</a>
            </div>
        </div>
    </div>
</div>
</nav>
