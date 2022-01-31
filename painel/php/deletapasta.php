<?php
function apagar($dir)
{
    if(is_dir($dir)){
        if($handle = @opendir($dir)){
            while(false !== ($file = @readdir($handle))){
                if(($file == ".") or ($file == "..")){
                    continue;
                }
                if(is_dir($file)){
                    apagar($dir.'/'.$file);
                }else{
                    unlink($dir.'/'.$file);
                }
            }
        }else{
            print("nao foi possivel abrir o arquivo.");
            return false;
        }
        
        @closedir($handle);
        @unlink($dir);
		@rmdir($dir);
    }
	else
    {
        print("diretorio informado invalido");
        return false;
    }
}
?>