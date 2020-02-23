window.onload = function ()
{
  const inputs = document.querySelectorAll('input[id^=quantity]');

  inputs.forEach((el) => {
    el.addEventListener(
      'keydown',

      (ev) => {
        console.log(ev);
        if (ev.keyCode < 48 || ev.keyCode > 57)
          ev.preventDefault();
      }
    );

    el.addEventListener(
      'keyup',

      (ev) => {
        let input = ev.target;
        let key = input.getAttribute('id').split('-')[1];
        let priceText = document.querySelector('#price-' + key).innerText;
        
        priceText = priceText.replace('$ ', '')
          .replace('.', '')
          .replace(',', '.');
        
        let priceValue = parseFloat(priceText);
        let newValue = priceValue * input.value;
        let formattedNewValue = '$ ' + Intl.NumberFormat('de-DE', { style: 'decimal', minimumFractionDigits: 2 }).format(newValue);
        let subTotal = document.querySelector('#subtotal-' + key);

        subTotal.innerText = formattedNewValue;
      }
    )
  });

}