<div class="content_cart">
		<h1>Оформление заказа</h1>
    <p>Ваш заказ:</p>
    <ol>
      <?
              for ($i=0; $i <=100; $i++) 
              { 
                if (isset($this->cartProd[$i])) 
                {?>
      <li><?=$this->cartProd[$i]['title']?>:  <?=$this->cartProd[$i]['count']?> шт. по цене <?=$this->cartProd[$i]['price']?> руб. - на сумму <?=$this->cartProd[$i]['summa']?> руб.</li>
      <?}}?>
    </ol>
    <p>Общая сумма заказа составила: <?=$this->cartInfo['cart_summa']-($this->cartInfo['cart_summa']*$_SESSION['discount']);?> руб.</p>
		<!--Форма -->
		<form class="form_1" action="<?=$this->url->action()?>" name='orderform' method="post">
			<input type="hidden" name="func" value="order" />
			<div>
				<label for="fio">ФИО: </label>
				<input id="fio" type="text" name="fio" required="on" onblur="checkInput(this)" value="<?=$_SESSION['fio'];?>">
			</div>
			<div>
				<label for="phone">Телефон: </label>
				<input id="phone" type="tel" name="phone" required="on"  onblur="checkInput(this)" value="<?=$_SESSION['phone'];?>">
			</div>
			<div>
				<label for="email">E-mail: </label>
				<input id="email" type="email" name="email" required="on" onblur="checkInput(this)" value="<?=$_SESSION['email'];?>">
			</div>

			<div class="no-widget">
				<label>Доставка: </label>
				<select class="delivery" name="delivery">
					<option>выберите, пожалуйста...</option>
					<option value="0" <?if ($_SESSION['delivery'] == '0') echo 'selected="0"'
          ?> >Самовывоз</option>
					<option value="1" <?if ($_SESSION['delivery'] == '1') echo 'selected="1"'
          ?>>Доставка (500 руб.)</option>
				</select>
			 
				<div class="select" role="listbox">
					<span class="value">выберите, пожалуйста..</span>
					<ul class="optList hidden" role="presentation">
						<li class="option" role="option" aria-selected="true">выберите, пожалуйста...</li>
						<li class="option" role="option" value="0">Самовывоз</li>
						<li class="option" role="option" value="1">Доставка (500 руб.)</li>
					</ul>
				 </div>
			</div>
			<div class="textarea">
				<label for="message1">Полный адрес (Страна, город, индекс, улица, дом, квартира):</label>
				<textarea id="message1" name='address' rows="8"><?=$_SESSION['address'];?></textarea>
			</div>
			<div class="textarea">
				<label for="message2">Примечание к заказу:</label>
				<textarea id="message2" name='notice' rows="8"><?=$_SESSION['notice'];?></textarea>
			</div>
			<button><i class="btn4" href="#">Закончить оформление заказа</i></button>
		</form>
	<!--/Форма -->
		
	</div>
	

	<!--Для формы доставки -->
<script>
NodeList.prototype.forEach = function (callback) {
  Array.prototype.forEach.call(this, callback);
}

// -------------------- //
// Function definitions //
// -------------------- //

function deactivateSelect(select) {
  if (!select.classList.contains('active')) return;

  var optList = select.querySelector('.optList');

  optList.classList.add('hidden');
  select.classList.remove('active');
}

function activeSelect(select, selectList) {
  if (select.classList.contains('active')) return;

  selectList.forEach(deactivateSelect);
  select.classList.add('active');
};

function toggleOptList(select, show) {
  var optList = select.querySelector('.optList');

  optList.classList.toggle('hidden');
}

function highlightOption(select, option) {
  var optionList = select.querySelectorAll('.option');

  optionList.forEach(function (other) {
    other.classList.remove('highlight');
  });

  option.classList.add('highlight');
};

function updateValue(select, index) {
  var nativeWidget = select.previousElementSibling;
  var value = select.querySelector('.value');
  var optionList = select.querySelectorAll('.option');

  optionList.forEach(function (other) {
    other.setAttribute('aria-selected', 'false');
  });

  optionList[index].setAttribute('aria-selected', 'true');

  nativeWidget.selectedIndex = index;
  value.innerHTML = optionList[index].innerHTML;
  highlightOption(select, optionList[index]);
};

function getIndex(select) {
  var nativeWidget = select.previousElementSibling;

  return nativeWidget.selectedIndex;
};

// ------------- //
// Event binding //
// ------------- //

window.addEventListener("load", function () {
  var form = document.querySelector('form');
 
  form.classList.remove("no-widget");
  form.classList.add("widget");
});

window.addEventListener('load', function () {
  var selectList = document.querySelectorAll('.select');

  selectList.forEach(function (select) {
    var optionList = select.querySelectorAll('.option'),
        selectedIndex = getIndex(select);

    select.tabIndex = 0;
    select.previousElementSibling.tabIndex = -1;

    updateValue(select, selectedIndex);

    optionList.forEach(function (option, index) {
      option.addEventListener('mouseover', function () {
        highlightOption(select, option);
      });

      option.addEventListener('click', function (event) {
        updateValue(select, index);
      });
    });

    select.addEventListener('click', function (event) {
      toggleOptList(select);
    });

    select.addEventListener('focus', function (event) {
      activeSelect(select, selectList);
    });

    select.addEventListener('blur', function (event) {
      deactivateSelect(select);
    });

    select.addEventListener('keyup', function (event) {
      var length = optionList.length,
          index  = getIndex(select);

      if (event.keyCode === 40 && index < length - 1) { index++; }
      if (event.keyCode === 38 && index > 0) { index--; }

      updateValue(select, index);
    });
  });
});
</script>