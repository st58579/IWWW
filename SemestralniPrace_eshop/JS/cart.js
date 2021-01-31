if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    updateTotal()
    let quantityInputs = document.getElementsByClassName("cart-quantity-input")
    for (let i = 0; i < quantityInputs.length; i++) {
        let input = quantityInputs[i]
        input.addEventListener('click', quantityChanged)
    }
}

function quantityChanged(event) {
    let input = event.target
    if (isNaN(input.value) || input.value <= 0) input.value = 1
    updateTotal()
}

function updateTotal() {
    let cartItemContainer = document.getElementsByClassName('cart-page')[0]
    let cartRows = cartItemContainer.getElementsByClassName('cart-row')
    let total = 0;
    for (let i = 0; i < cartRows.length; i++) {
        let cartRow = cartRows[i]
        let priceElement = cartRow.getElementsByClassName('cart-item-price')[0]
        let quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        let price = parseFloat(priceElement.innerText.replace(',-', ''))
        let quantity = quantityElement.value
        console.log(price * quantity);
        let subtotal = price * quantity;
        subtotal = Math.round(subtotal*100)/100;
        total = total + subtotal;
        document.getElementsByClassName('cart-row-subtotal')[i].innerText = subtotal + ',-';
    }
    total = Math.round(total*100)/100;
    let tax = total*0.2;
    tax = Math.round(tax*100)/100;
    let totalPlusTax = total + tax;
    totalPlusTax = Math.round(totalPlusTax*100)/100;

    document.getElementsByClassName('cart-total-price-nt')[0].innerText = total + ',-';
    document.getElementsByClassName('cart-tax')[0].innerText = tax + ',-';
    document.getElementsByClassName('cart-total-price')[0].innerText = totalPlusTax + ',-';
}

