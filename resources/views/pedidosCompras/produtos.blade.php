  <div class="col-lg-12">
    <div class="col-lg-12">
        <label for="valorUnitario">Valor Unitário *</label><br />
        <input class="form-control input-default " type="text" name="valorUnitario" id="valorUnitario" min="0" placeholder="Valor unitario" value="{{ $produto->valorUnitario }}">
    </div>
    <div class="col-lg-12">
        <label for="valorSugerido">Valor Sugerido Venda *</label><br />
        <input class="form-control input-default " type="text" name="valorSugerido" readonly id="valorSugerido" value="{{ number_format($produto->valorSugerido,2,',','.') }}">
    </div>
  </div>
