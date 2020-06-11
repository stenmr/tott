<body>
<form class="add_form">
<h2>Lisa enda toode</h2>
  <label>Vali pilt:</label>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br>
  <label>Toote nimi:</label>
  <input type="text" id="product_name" name="product_name" class="input_boarder">
  <label>Kategooria:</label>
  	  <select name="product" class="input_boarder">
          <option value="" selected disabled>Vali kategooria</option>
	      <option value="Piimatooted ja munad">Piimatooted ja munad</option>
		  <option value="Puuviljad<">Puuviljad</option>
		  <option value="Kypsetised">Küpsetised</option>
		  <option value="Juurviljad ja koogiviljad">Juurviljad ja köögiviljad</option>
		  <option value="Hoidised">Hoidised</option>
		  <option value="Marjad">Marjad</option>
		  <option value="Joogid">Joogid</option>
		  <option value="Seemned ja teraviljad">Seemned ja teraviljad</option>
		  <option value="Liha ja kala">Liha ja kala</option>
	  </select>
	  <br>
  <label>Hind:</label>
  <input type="number" step="0.01" id="price" name="price" class="input_boarder" maxlength="5">
  <button class="unit">kg</button>
  <button class="unit">tk</button>
  <label>Kogus:</label>
  <input type="number" id="amount" name="amount" class="input_boarder">
  <button class="addproduct">Kinnita</button>

</form>
</body>