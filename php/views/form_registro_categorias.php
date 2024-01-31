<main>
    <h2 class="display-3 text-center">Registro Categorias</h2>
    <div class="row justify-content-center">
        <form class="row g-3 row col-7" method="POST" action="index.php?view=_alta-categoria">
            <div class="col-md-4">
                <label for="codigo" class="form-label">Codigo Categoria</label>
                <input type="text" name="codigo" class="form-control" value="<?php echo get_last_cod_categorias_desc() ?>" readonly required>
            </div>
            <div class="col-md-8">
                <label for="nombre_categoria" class="form-label">Nombre Categoria</label>
                <input list="opcion_categorias" id="input-nombre_categoria" name="nombre_categoria" class="form-select">
        <datalist id="opcion_categorias">
    <?php
        $categorias = get_array_categorias();
        foreach ($categorias as $categoria){
            echo "<option value='" . htmlspecialchars($categoria['nombre_categoria']) . "'>" . htmlspecialchars($categoria['nombre_categoria']) . "</option>";
        }
    ?>  
        </datalist>
    </div>
            <div class="col-md-8">
                <label for="nombre_sub" class="form-label">Nombre Subcategoria</label>
                <input type="text" id="input-nombre_sub"name="nombre_sub" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Nombre Categoria Padre</label>
                <input type="text" id="input_oculto"name="categoria_padre" class="form-control">
                <select id="form-categoria_padre" name="categoria_padre" class="form-select" disabled>
                    <option></option>
    <?php 
        $categorias = get_array_categorias();
        $contador = 0;
        foreach ($categorias as $categoria){
            if($contador == 0){
                echo "<option value=".$categoria .">" . $categoria . "</option>";
                $contador++;
            }else{
                echo "<option value=". $categoria .">" . $categoria . "</option>";
            }
            
        }
    ?>  
        </select>
            </div class="col-md-12">
            <button type="submit" class="btn btn-primary col-5">Submit</button>    
        </form>
    </div>
</main>