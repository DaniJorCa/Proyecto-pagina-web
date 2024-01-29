<h2 class="display-2 text-center"> Alta Nuevo Articulo </h2>
<div class="row justify-content-center">
<form class="row g-3 row col-7" method="POST" action="index.php?good-added" enctype="multipart/form-data">
<div class="col-md-6">
      <label for="disabledTextInput" class="form-label">Codigo Articulo</label>
      <input type="text" name="id_articulo" id="disabledTextInput" class="form-control" placeholder= <?php echo '"'. generar_codigo_art() . '"'?> disabled required>
    </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Nombre</label>
    <input type="password" name="nombre" class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Imagen</label>
</div>
<div class="col-md-12">
    <img src= "<?php echo isset($_FILES['imagen']['name']) ? $_FILES['imagen'] : ''; ?>" id="imagePreview" class="rounded mx-auto d-block" alt="...">
</div>
  <div class="input-group">
  <label class="input-group-text" for="inputGroupFile01" >Upload</label>
  <input type="file" name="imagen" class="form-control" id="inputImg" onchange="showPreview()" required>
</div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Descripcion</label>
    <textarea type="text" name="descripcion" class="form-control" id="inputAddress2" placeholder="Detalla el articulo"required></textarea>
  </div>
  <div class="col-md-3">
    <label for="inputCity" class="form-label">Precio</label>
    <input type="text" name="precio" class="form-control" id="inputCity" placeholder="€" required>
  </div>
  <div class="col-md-3">
    <label for="inputZip" class="form-label">Precio de Compra</label>
    <input type="text" name="precio_compra" class="form-control" id="inputZip" placeholder="€" required>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Iva</label>
    <input type="text" name="iva" class="form-control" id="inputZip" required>
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">Genero</label>
    <select id="inputState" name="genero" class="form-select" required>
      <option selected>Hombre</option>
      <option>Mujer</option>
      <option>Niño</option>
      <option>Unisex</option>
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputState" class="form-label">Categoria</label>
    <select id="inputState" name="categoria" class="form-select" required>
<?php
    $categorias = get_array_categorias();
    $contador = 0;
    foreach ($categorias as $categoria){
        if($contador == 0){
            echo "<option selected>" . $categoria . "</option>";
            $contador++;
        }else{
            echo "<option>" . $categoria . "</option>";
        }
        
    }
?>  
    </select>
</div>
    <div class="col-md-6">
    <label for="inputState" class="form-label">Subcategoria</label>
    <select id="inputState" name="subcategoria" class="form-select" required>
<?php
    $categorias = get_array_subcategorias();
    $contador = 0;
    foreach ($categorias as $categoria){
        if($contador == 0){
            echo "<option selected>" . $categoria . "</option>";
            $contador++;
        }else{
            echo "<option>" . $categoria . "</option>";
        }
        
    }
?>     
    </select>
  </div>
  <div class="col-md-3">
    <label for="inputZip" class="form-label">Stock</label>
    <input type="text" name="stock" class="form-control" id="inputZip" required>
  </div>
  <div class="col-md-3">
    <label for="inputZip" class="form-label">Stock minimo</label>
    <input type="text" name="stock_minimo" class="form-control" id="inputZip" required>
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