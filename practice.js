let size = "small";
let toppings = [];
let crust = "classic";
let flavor = 'margherita';
let quantityPizza = 1;
let FinalPrice = 0;

let priceOfSize = 800;
let priceOfCrust = 0;
const toppingsprice = {
    "pepperoni": 100,
    "mushrooms": 100,
    "onions": 10,
    "sausage": 10,
    "green-peppers": 1023,
    "extra-cheese": 12
};

function changeSize(newSize) {
    size = newSize;
    const smal = document.getElementById("sma");
    const medi = document.getElementById("med");
    const larg = document.getElementById("lar");
    if (size === 'small') {
        priceOfSize = 800;
        smal.style.backgroundColor = '#ff5405';
        smal.style.color = '#ffff';
        medi.style.backgroundColor = 'white';
        medi.style.color = '#333';
        larg.style.backgroundColor = 'white';
        larg.style.color = '#333';

    } else if (size === 'medium') {
        priceOfSize = 1200;
        smal.style.backgroundColor = 'white';
        smal.style.color = '#333';
        medi.style.backgroundColor = '#ff5405';
        medi.style.color = '#ffff';
        larg.style.backgroundColor = 'white';
        larg.style.color = '#333';
    } else if (size === 'large') {
        priceOfSize = 1800;
        smal.style.backgroundColor = 'white';
        smal.style.color = '#333';
        medi.style.backgroundColor = 'white';
        medi.style.color = '#333';
        larg.style.backgroundColor = '#ff5405';
        larg.style.color = '#ffff';
    }
    updatePrice();
}

function selectFlavor(flavourchange) {
    const fla = document.getElementById(flavourchange);
    fla.style.backgroundColor = '#ff5405';
    fla.style.color = 'white';
    const allFlavors = document.querySelectorAll('.flavor'); 
    for (let other of allFlavors) {
        if (other !== fla) {
            other.style.backgroundColor = 'white';
            other.style.color = 'black';
        }
    }

    flavor = flavourchange;
    updatePrice();

}

function addTopping(topping) {
    const index = toppings.indexOf(topping);
    const toppingElement = document.getElementById(topping);
    if (index === -1) {
        toppings.push(topping);
        toppingElement.style.backgroundColor = '#ff5405';
        toppingElement.style.color = 'white';
    } else {
        toppings.splice(index, 1);
        toppingElement.style.backgroundColor = 'white';
        toppingElement.style.color = 'black';
    }
    updatePrice();
}



function changeCrust(newCrust) {
    crust = newCrust;

    const cla = document.getElementById("classic");
    const thi = document.getElementById("thin");
    const stu = document.getElementById("stuffed");

    if (crust === 'classic') {
        priceOfCrust = 0;
        cla.style.backgroundColor = '#ff5405';
        cla.style.color = '#ffff';
        thi.style.backgroundColor = 'white';
        thi.style.color = '#333';
        stu.style.backgroundColor = 'white';
        stu.style.color = '#333';
    } else if (crust === 'thin') {
        priceOfCrust = 500;
        cla.style.backgroundColor = 'white';
        cla.style.color = '#333';
        thi.style.backgroundColor = '#ff5405';
        thi.style.color = '#ffff';
        stu.style.backgroundColor = 'white';
        stu.style.color = '#333';
    } else if (crust === 'stuffed') {
        priceOfCrust = 300;
        cla.style.backgroundColor = 'white';
        cla.style.color = '#333';
        thi.style.backgroundColor = 'white';
        thi.style.color = '#333';
        stu.style.backgroundColor = '#ff5405';
        stu.style.color = '#ffff';
    }

    updatePrice();
}



function changequantity() {
    const pizzaQun = document.getElementById("input-item-quantity");
    quantityPizza = pizzaQun.value;

    updatePrice();

}




function updatePrice() {


    document.getElementById("cart-items").innerHTML = "";

    totalPrice = 0;

    totalPrice += priceOfSize;
    totalPrice += priceOfCrust;
    
    const newListItem = document.createElement("li");
    document.getElementById("cart-items").appendChild(newListItem);
    newListItem.textContent = "Size of the Pizza : " + size.toUpperCase();
    
    const newListItemf = document.createElement("li");
    document.getElementById("cart-items").appendChild(newListItemf);
    newListItemf.textContent = "Flavour of the Pizza : " + flavor.toUpperCase();
    
    let i = 1;
    const newListItemt = document.createElement("li");
    document.getElementById("cart-items").appendChild(newListItemt);
    newListItemt.textContent = "Toppings ";
    
    for (const topping of toppings) {
        const toppingLi = document.createElement("li");
        toppingLi.textContent = "Toppins no " + i + " : " + topping.toUpperCase();
        document.getElementById("cart-items").appendChild(toppingLi);
        totalPrice += toppingsprice[topping];
        i++;
    }
    totalPrice *= quantityPizza;

    const CRUSTlIST = document.createElement("li");
    document.getElementById("cart-items").appendChild(CRUSTlIST);
    CRUSTlIST.textContent = "Crust of the Pizza : " + crust.toUpperCase();

    const newListItemq = document.createElement("li");
    document.getElementById("cart-items").appendChild(newListItemq);
    newListItemq.textContent = "Quantity of the Pizza : " + quantityPizza;

    document.getElementById("total-price").textContent = totalPrice.toFixed(2);
}



let cartItems = [];
const addToCartButton = document.getElementById("addToCartButton");
addToCartButton.addEventListener("click", () => {
    
    const WholeItems = document.querySelector("#cart-items").textContent;
    
    const foodItem = {
        item: "Pizza",
        size: "Size : " + size,
        flavor: "Flavour : " + flavor,
        toppings: "Toppings : " + toppings,
        crust: "Crust : " + crust,
        Quantity : "Quantity : " + quantityPizza,
        price: "Price : " + totalPrice
    };
    
    cartItems.push(foodItem);
    document.getElementById("cart-list").innerHTML = " ";
    for (let add of cartItems) {
        const newListItemSC = document.createElement("li");
        document.getElementById("cart-list").appendChild(newListItemSC);
        
        const listItemText = `
        <strong>${add.item}</strong><br>
        ${add.size}<br>
        ${add.flavor}<br>
        ${add.toppings}<br>
        ${add.crust}<br>
        ${add.Quantity}<br>
        ${add.price}<br>
        `;
        
        newListItemSC.innerHTML = listItemText;
        console.table(cartItems[0]);
    }
    
    const mesOfAtSC = document.getElementById("cart-items")
    mesOfAtSC.textContent = "";
    mesOfAtSC.innerHTML = "Item added to Shopping Cart!";
    


    
    FinalPrice += totalPrice;
    document.getElementById("Final-Price").innerHTML = " ";
    const FinalPriceitem = document.createElement("li")
    document.getElementById("Final-Price").appendChild(FinalPriceitem);
    FinalPriceitem.textContent ="Final Price of All the Items : " + FinalPrice;
    console.log(FinalPrice)
    
    
    savedata();
    showTask();    
});





const cartitems = document.getElementById("cart-list"); 
const FinalPriceSave = document.getElementById("Final-Price"); 
function savedata() {
    localStorage.setItem("pizzaData", cartitems.innerHTML);
    localStorage.setItem("pizzaPrice", FinalPriceSave.innerHTML);
//    console.log("Data saved to localStorage:", cartitems.innerHTML);
}

function showTask() {
   // console.log("Attempting to retrieve data from localStorage");
    cartitems.innerHTML = localStorage.getItem("pizzaData");
    FinalPriceSave.innerHTML = localStorage.getItem("pizzaPrice");
  //  console.log("Data retrieved from localStorage:", cartitems.innerHTML);
}

const clear = document.getElementById("clear")

clear.addEventListener("click", () => {
        localStorage.clear();
        location.reload();
        FinalPrice=0;

    
 });


showTask();