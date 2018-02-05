<div class="wizard-wrapper">
  <div class="container">
    <h1 class="title">Ficamos felizes que você tenha escolhido <br> o nosso programa</h1>

    <div class="wizard-steps-wrapper">
      <div class="checkout-wizard">
        <div class="step">
          <a href="/cart">
            <div class="circle">
              <i class="fa fa-shopping-bag"></i>
            </div>
            <p class="text">Seleção de programas</p>
          </a>
        </div>
        <div class="step">
          <a href="/checkout?form=customer_details">
            <div class="circle">
              <i class="fa fa-user"></i>
            </div>
            <p class="text">Dados pessoais</p>
          </a>   
        </div>
        <div class="step">
          <a href="/checkout?form=order_review">
            <div class="circle">
              <i class="fa fa-credit-card"></i>
            </div>
            <p class="text">Pagamento</p>
          </a>
        </div>
        <div class="step">
          <a href="#">
            <div class="circle">
              <i class="fa fa-check"></i>
            </div>
            <p class="text">Compra finalizada</p>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  var searchParam = window.location.search.substr(1);
  var paramArr = searchParam.split('=');

  if(paramArr[0] == 'form') {

  }
  console.log(paramName);
</script>