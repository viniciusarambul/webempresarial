  <div class="col-lg-12">
    <div class="input col s6">
        <label for="valorUnitario">Valor Unitário *</label><br />
        <input class="form-control input-default " type="text" name="valorUnitario" id="valor" min="0" placeholder="Valor unitario" value="{{ $produto->valorUnitario }}">
    </div>
    <div class="input col s6">
        <label for="valorSugerido">Valor Sugerido Venda *</label><br />
        <input class="form-control input-default " type="text" name="valorSugerido" readonly id="valorSugerido" value="{{ $produto->valorSugerido }}">
    </div>
  </div>
