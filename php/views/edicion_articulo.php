
<h2 class="display-2 text-center"> Edicion Articulo </h2>
<div class="row justify-content-center">
<form class="row g-3 row col-7" method="POST" action="index.php?view=_edit_good" enctype="multipart/form-data">
<div class="col-md-6">
      <label for="id_articulo" class="form-label">Codigo Articulo</label>
      <input type="text" name="id_articulo" id="cod_art-edit" class="form-control" value="<?php echo $articulo_editar[0]['id_articulo']; ?>" readonly required>
    </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="<?php echo $articulo_editar[0]["nombre"]?>" required>
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Imagen</label>
</div>
<div class="col-md-12">
    <img src= "<?php echo isset($_FILES['imagen']['name']) ? $_FILES['imagen'] : $articulo_editar[0]['img']; ?>" id="imagePreview" class="rounded mx-auto d-block" alt="...">
</div>
  <div class="input-group">
  <label class="input-group-text" for="inputGroupFile01" >Upload</label>
  <input type="file" name="img" class="form-control" id="inputImg" onchange="showPreview()">
</div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Descripcion</label>
    <textarea type="text" value="<?php echo $articulo_editar[0]["descripcion"]?>" name="descripcion" class="form-control" id="inputAddress2" placeholder="Detalla el articulo"required><?php echo $articulo_editar[0]["descripcion"]?></textarea>
  </div>
  <div class="col-md-3">
    <label for="inputCity" class="form-label">Precio</label>
    <input type="text" name="precio" value="<?php echo $articulo_editar[0]["precio"]?>" class="form-control" id="inputCity" placeholder="€" required>
  </div>
  <div class="col-md-3">
    <label for="inputZip" class="form-label">Precio de Compra</label>
    <input type="text" name="neto_compra" value="<?php echo $articulo_editar[0]["neto_compra"]?>" class="form-control" id="inputZip" placeholder="€" required>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Iva</label>
    <input type="text" name="iva" value="<?php echo $articulo_editar[0]["iva"]?>" class="form-control" id="inputZip" required>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Genero</label>
    <select id="inputState" name="genero" value="<?php echo $articulo_editar[0]["genero"]?>" class="form-select" required>
      <option selected>Hombre</option>
      <option>Mujer</option>
      <option>Niño</option>
      <option>Unisex</option>
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputState" class="form-label">Categoria</label>
    <select id="input-categoria_articulo" value="<?php echo $articulo_editar[0]["categoria"]?>" name="categoria" class="form-select" required>
<?php
    $categorias = get_array_categorias();
    $contador = 0;
    foreach ($categorias as $categoria){
        if($contador == 0){
            echo "<option selected value ='".$categoria['codigo']."'>" . $categoria['nombre'] . "</option>";
            $contador++;
        }else{
            echo "<option value ='".$categoria['codigo']."'>" . $categoria['nombre'] . "</option>";
        }
        
    }
?>  
    </select>
</div>
    <div class="col-md-6">
    <label for="inputState" class="form-label">Subcategoria</label>
    <select id="input-subcategoria_articulo" value="<?php echo $articulo_editar[0]["subcategoria"]?>" name="subcategoria" class="form-select" required> 
      <option selected value= '<?php echo $articulo_editar['subcategoria']?>'> 
        <?php 
          $subcategorias = get_array_subcategorias();
          foreach($subcategorias as $subcategoria){
            if($subcategoria['codigo'] === $articulo_editar['subcategoria']){
              echo $subcategoria['nombre'];
            }
          } 
        ?> 
      </option>
    </select>
  </div>
  <div class="col-md-3">
    <label for="inputZip" class="form-label">Stock</label>
    <input type="number" value="<?php echo $articulo_editar[0]["stock"]?>" name="stock" class="form-control" id="inputZip" required>
  </div>
  <div class="col-md-3">
    <label for="inputZip" class="form-label">Stock minimo</label>
    <input type="number" value="<?php echo $articulo_editar[0]["stock_minimo"]?>" name="stock_minimo" class="form-control" id="inputZip" required>
  </div>
  <div class="col-md-3">
    <label for="inputState" class="form-label">Es Baja?</label>
    <select id="input-esBaja_articulo" name="esBaja" class="form-select">
      <option  value ='null'>No</option> 
      <option value ='SI'>Baja</option>
    </select>
  </div>
  <div class="col-12">
  </div>
  <div class="col-12">
    <button type="submit" name="registro_articulo" class="btn btn-primary">Sign in</button>
  </div>
</form>
</div>


<script>
function showPreview() {
    var input = document.getElementById('inputImg');
    var preview = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>