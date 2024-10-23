

<div class="single-product " style="margin-top: 12rem !important;">
		<div class="container">
            <?php
                viewDetails();
                ?>
		</div>
	</div>
    <script>
        var increaseBtn = document.getElementsByClassName('btn-increase');
var decreaseBtn = document.getElementsByClassName('btn-decrease');
var itemsToBuy = document.getElementById('num_of_items');

function increaseValueBtn(){
    var numero = Number(itemsToBuy.value)+1;
    itemsToBuy.value = numero;
}
function decreaseValueBtn(){
    var numero = Number(itemsToBuy.value)-1;
    numero = numero < 0 ? 0 : numero;
    itemsToBuy.value = numero;
}
    </script>