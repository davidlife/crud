<?=$cabecera?>
    
    <hr>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Ingresar datos</h5>
            <form method="post" action="<?=base_url('/guardar')?>" enctype="multipart/form-data">
        
            <div class="form-group">
                <label for="nombre">Nombre del libro:</label>
                <input id="nombre" class="form-control" type="text" required name="nombre">
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input id="imagen" class="form-control-file" type="file" name="imagen">
            </div>

                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="<?=base_url('listar');?>" class="btn btn-danger" type="submit">Cancelar</a>

        </form>
        </div>
    </div>
    
<?=$pie?>