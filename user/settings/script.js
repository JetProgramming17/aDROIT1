const importgroups = {
  "search-settings" : {
    "icon-path" : "54/54481"
  },
  "connections" : [{
    "icon-path" : "659/659998",
    "alt" : "connected",
    "contents-title" : "Connected devices",
    "contents-sub" : "Bluetooth, USB"
  },{
    "icon-path" : "2901/2901643",
    "alt" : "wireless",
    "contents-title" : "Network & Internet",
    "contents-sub" : "Wi-Fi, Data, Ethernet"
  }],
  "visual" : [{
    
  }],
  "capacity" : [{
    
  }],
  "privacy" : [{
    
  }],
  "data" : [{
    
  }],
  "etc" : [{
    
  }],
  "about" : [{
  
  }]
  /* Fill in the rest */
  /*
  group id : [{
    group-con
    group-con
  }]
  */
};
/* Create a function that imports groups and creates the div group and group-con elements inside the main element*/
const docmain = document.querySelector("main");
const groups = document.querySelectorAll(".group");
const items = document.querySelectorAll(".contents-title");
const searchEle = document.querySelector("search");
const holdList = document.createElement("datalist");
holdList.id = "searchList";
groups.forEach((i) => {
  let x = document.createElement("option");
  x.value = i.id;
  holdList.appendChild(x);
});
items.forEach((i) => {
  let x = document.createElement("option");
  x.value = i.innerHTML;
  holdList.appendChild(x);
});
searchEle.appendChild(holdList);

	
//pop-up
$('.pop-up').hide(0);
$('.pop-up-container').hide(0);

$('.pop-up-button').click(function(){
  $('.pop-up-container').show(0);
  $('.pop-up').fadeIn(300);
  $('.pop-up-button').hide(0);
});
$('.pop-up span').click(function() {
  $('.pop-up-container').hide(0);
  $('.pop-up').hide(0);
  $('.pop-up-button').show(0);
});

//pop-up methods