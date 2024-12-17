function changeShippingAsBillingStatus(){
    let shippingCheckBox = document.getElementById('shippingAsBilling')
    console.log(111111)
    let shippingWrapper = document.getElementById('shippinDetailsWrapperId')
    shippingWrapper.classList.toggle('shippinDetailsWrapper--visible')
}


function showToast(message, type) {
    const bgColor = type === 'success' ? '#28a745' : '#dc3545';
    Toastify({
        text: message,
        duration: 3000, // Duration in milliseconds
        gravity: "top", // `top` or `bottom`
        position: 'right', // `left`, `center` or `right`
        backgroundColor: bgColor,
        stopOnFocus: true, // Prevents dismissing of toast on hover
    }).showToast();
  }
  function checkIfItemsAddedToCart() {
    document.querySelectorAll('.productPriceButtonAdd')?.forEach(item=>{
        const cartItems = JSON.parse(localStorage.getItem('cart')) || []
        if (cartItems?.find(cart => item?.dataset?.id === cart?.id)) {
          item?.classList?.add('hidden')
          document.getElementById('proceedToCheckout')?.classList?.remove('hidden')
          document.querySelector(`.productPriceButtonRemove-${item?.dataset?.id }`)?.classList?.remove('hidden')
        }
    })
  }
  checkIfItemsAddedToCart()


  function addToCart(event, price, id) {
    let cartItems = JSON.parse(localStorage.getItem('cart')) || []
    if (!cartItems?.find(item => item?.id === id)) {
        cartItems = [...cartItems, {id, price}]
        document.querySelector(`.productPriceButtonRemove-${id}`)?.classList?.toggle('hidden')
        document.querySelector(`.productPriceButtonAdd-${id}`)?.classList?.toggle('hidden')
        document.getElementById('proceedToCheckout')?.classList?.remove('hidden')
    } else {
        showToast("Item Already Added to Cart")
        return;
    }
    localStorage.setItem('cart', JSON.stringify(cartItems))
    calcualteTotalPrice(cartItems)
    showToast("Item Added to Cart Successfully", 'success')
  }

  function removeFromCart(event, id) {
    let cartItems = JSON.parse(localStorage.getItem('cart')) || []
    if (cartItems?.find(item => item?.id === id)) {
        cartItems = cartItems?.filter(item => item?.id !== id)
        document.querySelector(`.productPriceButtonAdd-${id}`)?.classList?.toggle('hidden')
        document.querySelector(`.productPriceButtonRemove-${id}`)?.classList?.toggle('hidden')
    } else {
        showToast("Item Already Removed From Cart")
        return;
    }

    if (cartItems?.length === 0 ) {
        document.getElementById('proceedToCheckout')?.classList?.add('hidden')

    }
    localStorage.setItem('cart', JSON.stringify(cartItems))
    calcualteTotalPrice(cartItems)
    showToast("Item Removed From Cart Successfully", 'success')
  }

  function showCheckoutType() {
    document.getElementById('checkoutTypes').classList.remove('hidden')
    document.getElementById('proceedToCheckout').classList.add('hidden')
    document.getElementById('products').classList.add('hidden')
  }

  function openAsAGuestSection() {
    document.getElementById('checkoutTypeAsAGuest').classList.remove('hidden')
    document.getElementById('checkoutTypes').classList.add('hidden')
    document.getElementById('savedCards').classList.add('hidden')
  }
  function openPaymentOptions() {
    document.getElementById('paymentSection').classList.remove('hidden')
    document.getElementById('ptoPayment').classList.add('hidden')
    document.getElementById('completeOrder').classList.remove('hidden')

  }

  function openAsAUserSection() {
    document.getElementById('checkoutTypeAsAUser').classList.remove('hidden')
    document.getElementById('checkoutTypes').classList.add('hidden')
  }

  function calcualteTotalPrice(cart) {
    let cartItems = cart ? cart : JSON.parse(localStorage.getItem('cart')) || []
    const totalPrice = cartItems?.reduce((total, item)=>{
        return total += Number(item?.price)
    }, 0)
    document.getElementById('paidAmountSpan').textContent = `${totalPrice} AED`
    return totalPrice
  }
  calcualteTotalPrice()
