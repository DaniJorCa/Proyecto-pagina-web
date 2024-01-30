<main>
    <h2 class="display-3 text-center">Registro Categorias</h2>
    <div class="row justify-content-center">
        <form class="row g-3 row col-7" method="POST" action="index.php?view=_alta-articulo">
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">Codigo Categoria</label>
                <input type="text" name="codigo" class="form-control" readonly required>
            </div>
            <div class="col-md-8">
                <label for="inputPassword4" class="form-label">Nombre Categoria</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="col-md-8">
                <label for="inputPassword4" class="form-label">Nombre Subcategoria</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Categoria</label>
                <select id="inputState" name="categoria" class="form-select" required>
    <?php 
        //Meter la funcion correspondiente
        /*$categorias = get_array_categorias();
        $contador = 0;
        foreach ($categorias as $categoria){
            if($contador == 0){
                echo "<option selected>" . $categoria . "</option>";
                $contador++;
            }else{
                echo "<option>" . $categoria . "</option>";
            }
            
        }*/
    ?>  
        </select>
            </div>
        </form>
    </div>
</main>