require("head.php");
<body>
<h2>Lisa uus toode</h2>
<form>
  <label>Tooted:</label><br>
  	  <select name="product">
	    <option value="" selected disabled>Vali toode</option>
		<?php echo $showproducts; ?>
	  </select>
	  <br>
  <label>Kogus:</label><br>
  <input type="number" id="amount" name="amount"><br>
  <button class="button addproduct">Kinnita</button>
  
  <p> Ei leidnud sobivat toodet?</p><br>
  <a href="addnew.php">Loo uus toode</a>.</p><br>
</form>
</body>
require("footer.php");
