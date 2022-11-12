let num = document.getElementById("subtotal").value;
  let b = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  document.getElementById('subtotal').value = b;

function plus(){
  let a = document.getElementById("basket").value;
  document.getElementById('basket').value = ++a;
  
  let stock = document.getElementById('stock').value;
  let basket = document.getElementById("basket").value;
  let price = document.getElementById("price").value;
  document.getElementById('subtotal').value = basket*price;
  
  let num = document.getElementById("subtotal").value;
  let b = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  document.getElementById('subtotal').value = b;
  if(basket != 0){
    document.getElementById('spantext').textContent="";
    const button = document.getElementById('btnbtn');
   button.removeAttribute('disabled', '');
   const btn = document.getElementById('btnbeli');
   btn.removeAttribute('disabled', '');
  }
  if(basket > parseInt(stock)){document.getElementById('basket').value = stock;
    let num = document.getElementById('subtotal').value = stock * price;
    let b = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById('subtotal').value = b;
  };
};
function minus(){
  let a = document.getElementById("basket").value;
  document.getElementById('basket').value = --a;
  let basket = document.getElementById("basket").value;
  let price = document.getElementById("price").value;
  document.getElementById('subtotal').value = basket*price;
  
  let num = document.getElementById("subtotal").value;
  let b = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  document.getElementById('subtotal').value = b;
  if(basket < 1){document.getElementById('basket').value = 1;
    let num = document.getElementById('subtotal').value = price;
    let b = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById('subtotal').value = b;
  };
};

function keyup(){
  let basket = document.getElementById('basket').value;
  let price = document.getElementById("price").value;
  document.getElementById('subtotal').value = basket*price;
  
  let num = document.getElementById("subtotal").value;
  let b = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  document.getElementById('subtotal').value = b;
  let stock = document.getElementById('stock').value;
  let subtotalPrice = parseInt(stock) * parseInt(price);
  
  if(basket == 0){
    document.getElementById('spantext').textContent="Jumlah produk tidak boleh 0";
    const button = document.getElementById('btnbtn');
   button.setAttribute('disabled', '');
   
   const btn = document.getElementById('btnbeli');
   btn.setAttribute('disabled', '');
  }else if(basket != 0){
    document.getElementById('spantext').textContent="";
    const button = document.getElementById('btnbtn');
   button.removeAttribute('disabled', '');
   const btn = document.getElementById('btnbeli');
   btn.removeAttribute('disabled', '');
  }
  
  if(basket > parseInt(stock)){document.getElementById('basket').value = stock;
    let num = document.getElementById('subtotal').value = stock * price;
    let b = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById('subtotal').value = b
  }else if(basket < 0){document.getElementById('basket').value = 0;
    let num = document.getElementById('subtotal').value = price;
    let b = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById('subtotal').value = b;
  };
};

function basketClick(){
  let basket = document.getElementById('basket').value;
  document.getElementById('basketH').value = basket;
}
