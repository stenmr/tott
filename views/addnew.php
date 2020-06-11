require("head.php");
<body>
<h2>Lisa enda toode</h2>
<form>
  <label>Vali pilt</label><br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br>
  <label>Toote nimi:</label><br>
  <input type="text" id="product_name" name="product_name"><br>
  <label>Kategooria:</label><br>
  	  <select name="product">
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
  <label>Hind:</label><br>
  <input type="number" step="0.01" id="price" name="price"><br>
  <label>Kogus:</label><br>
  <input type="number" id="amount" name="amount"><br>
  <button class="button addproduct">Kinnita</button>
  
</form>
</body>
require("footer.php");