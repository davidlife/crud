<?=$cabecera?>
    
    <hr>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Editar datos</h5>
            <form method="post" action="<?=base_url('/actualizar')?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$libro['id'] ?>">
            <div class="form-group">
                <label for="nombre">Nombre del libro:</label>
                <input id="nombre" class="form-control" type="text" value="<?=$libro['nombre'] ?>" name="nombre">
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input id="imagen" class="form-control-file" type="file" name="imagen">
                <img class="img-thumbnail" src="<?=base_url()?>/upload/<?=$libro['imagen'] ?>" width="60" alt="">
            </div>

                <button class="btn btn-success" type="submit">Editar</button>
                <a href="<?=base_url('listar');?>" class="btn btn-danger" type="submit">Cancelar</a>
        
        </form>
        </div>
    </div>
    
<?=$pie?>