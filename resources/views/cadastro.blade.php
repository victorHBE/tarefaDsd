
<form action="{{url('cadastro')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="exampleInputDesc">Descrição</label>
    <input type="text" class="form-control" id="exampleInputDesc" aria-describedby="DescHelp" placeholder="Sua descrição">
    <small id="DescHelp" class="form-text text-muted">Escolha uma legenda legal.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputCidade">Cidade</label>
    <input type="text" class="form-control" id="exampleInputCidade" placeholder="Cidade">
  </div>
  <div class="form-group form-check">
    <input type="file" name="arquivo[]" class="form-check-input" multiple="multiple" id="exampleFile">
    <label class="form-check-label" for="exampleFile">Envie Fotos</label>
    <div class="danger">Atenção: Os arquivos devem ser png ou jpeg</div>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>