import "https://cdn.quilljs.com/1.3.6/quill.js";

// ==============function start===================//
function handleOpenNavMobile(){
    $("#menumobile").click(function(){

        $(".sidebar").css("left","0%")
        $(".sidebar-wrapper").css("transform","translateX(0%)")
    })
    $(".sidebar-close i").click(function(){
        $(".sidebar").css("left","100%")
        $(".sidebar-wrapper").css("transform","translateX(100%)")
    })
    $(".sidebar").click(function(){
        $(".sidebar").css("left","100%")
        $(".sidebar-wrapper").css("transform","translateX(100%)")
    })
    $(".sidebar-wrapper").click(function(e){
        e.stopPropagation()
    })
}
function handleShowSortCollection(){
    $(".c-nav-hhiden").click(function(){
        $(".g-left").css("display","block")
        $(".g-left").click(function(e){
            e.stopPropagation()
            setTimeout(()=>{
                $(".g-left").css("display","none")

            },1000)
        })
    })
}
function handleTreeView (){
    $(".tree-item-icon").click(function(){
        if($(this).parent().hasClass("has")){
            const ulChild = $(this).parent().siblings()
            if( $(this).parent().siblings().hasClass("active")){
                ulChild.removeClass("active")
            }else{
                ulChild.addClass("active")
            }
        }
    })
}
function handleReferralTab(){
    $(".referral-tab-item").click(function(){
        const typeActive = $(this).attr("type")
        $(".referral-tab-item").each(function(){
            $(this).removeClass("active")
            const typeActive1 = $(this).attr("type")
            $(`.referral-content.${typeActive1}`).removeClass("active")
        })
        $(this).addClass("active")
        console.log(typeActive)
        $(`.referral-content.${typeActive}`).addClass("active")
    })
}
const ONE = document.querySelector.bind(document);
 function Validator(selector, options) {
  if (!options) {
    options = {};
  }

  function getParent(element, selector) {
    while (element.parentElement) {
      if (element.parentElement.matches(selector)) {
        return element.parentElement;
      }
      element = element.parentElement;
    }
  }

  var formRules = {};
  var validatorRules = {
    required: function (value) {
      return value ? undefined : "Please enter this field";
    },
    email: function (value) {
      const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      return regex.test(value) ? undefined : "It must be an email";
    },
    min: function (min) {
      return function (value) {
        return value.length >= min ? undefined : `its min ${min} keys`;
      };
    },
  };
  var formElement = document.querySelector(selector);
  if (formElement) {
    var inputs = formElement.querySelectorAll("[name][rules]");
    for (var input of inputs) {
      var rules = input.getAttribute("rules").split("|");
      for (var rule of rules) {
        var ruleInfo;
        var isRuleHasValue = rule.includes(":");
        if (isRuleHasValue) {
          ruleInfo = rule.split(":");
          rule = ruleInfo[0];
        }
        var ruleFunc = validatorRules[rule];
        if (isRuleHasValue) {
          ruleFunc = ruleFunc(ruleInfo[1]);
        }
        if (Array.isArray(formRules[input.name])) {
          formRules[input.name].push(ruleFunc);
        } else {
          formRules[input.name] = [ruleFunc];
        }
      }

      // lawng nghe input

      input.onblur = handleValidate;
      input.oninput = handleClearError;
    }
    // ham onblur
    function handleValidate(e) {
      var rules = formRules[e.target.name];
      var errorMessage;

      for (var rule1 of rules) {
        errorMessage = rule1(e.target.value);
        if (errorMessage) break;
      }

      // neu co loi hienj message loi
      if (errorMessage) {
        var formGroup = getParent(e.target, ".form-body");
        if (formGroup) {
          formGroup.classList.add("invalid");
          if (formGroup.nextElementSibling) {
            formGroup.nextElementSibling.innerText = errorMessage;
          }
        }
      }
      return !errorMessage;

      // console.log(errorMessage)
    }

    function handleClearError(e) {
      var formGroup = getParent(e.target, ".form-body");
      if (formGroup.classList.contains("invalid")) {
        formGroup.classList.remove("invalid");
        if (formGroup.nextElementSibling) {
          formGroup.nextElementSibling.innerText = "";
        }
      }
    }
    // xu li hanh vi submit
    formElement.onsubmit = function (e) {
      e.preventDefault();

      var inputs = formElement.querySelectorAll("[name][rules]");
      var isValid = true;

      for (var input of inputs) {
        if (!handleValidate({ target: input })) {
          isValid = false;
        }
      }
      if (isValid) {
        if (ONE(".loading")) ONE(".loading").style.display = "flex";
        if (typeof options.onSubmit === "function") {
          var enableInputs = formElement.querySelectorAll("[name]");
          var formValues = Array.from(enableInputs).reduce(function (
            values,
            input
          ) {
            switch (input.type) {
              case "radio":
                values[input.name] = formElement.querySelector(
                  'input[name="' + input.name + '"]:checked'
                ).value;
                break;
              case "checkbox":
                if (!input.matches(":checked")) {
                  values[input.name] = "";
                  return values;
                }
                if (!Array.isArray(values[input.name])) {
                  values[input.name] = [];
                }
                values[input.name].push(input.value);
                break;
              case "file":
                values[input.name] = input.files;
                break;
              default:
                values[input.name] = input.value;
            }
            return values;
          },
          {});
          options.onSubmit(formValues);
        }
      }
    };
  }
}
function formartPrice(number) {
  const VND = new Intl.NumberFormat("vi-VN", {
    style: "currency",
    currency: "VND",
  });
  return VND.format(number)
  
}
             
// -----------------------------------------------------admdin------------------------------//
function handleCreateProduct(){
    let num = 0;
   
    //modal edit category
    if($("#select-category-product").length){
        $("#select-category-product").click(function(){
            $(".modal-edit-cate").css("display","flex")
        })
    }
    $(document).on("click",".btn-modal-cate-close",function(){
        $(".modal-edit-cate").css("display","none")
    })
    //get more category
    $(".modal-cate-item").each(()=>{
        $(this).click(()=>{
            $(this).addClass("active")
            console.log($(this).attr("checkLast"))
        })
    })
    $(".modal-cate-item").click(function(){

    })
    //add attribute
    $(".create-btn-add-attibute").click(function(){
         const attrHtml =`<div class="attr-item">
            <div class="attr-no">
                ${num++}
            </div>
            <div class="attr-size">
                <input type="text" name="ProductProperties_Size" value="" placeholder="X, L, M,..." />
            </div>
            <div class="attr-color">
                <input type="color" name="ProductProperties_Color" value="" placeholder="Red, pink,blue,..." />
            </div>
            <div class="attr-quantity">
                <input type="number" name="ProductProperties_Quantity" value="" placeholder="0" />
            </div>
            <div class="attr-price">
                <input type="number" name="ProductProperties_Price" value="" placeholder="$ 0" />
            </div>
            <div class="attr-remove"> <i class="fa-solid fa-trash-can"></i></div>
        </div>`
        $(".create-pro-attr-body").css("display","flex")
        $(".attr-list").append(attrHtml)
        //- remove attribute
        $(".attr-list .attr-remove").click(function(){
            const parent = $(this).parent()
            if(parent) parent.empty()
        })
    })
    //show img
    $("input[name='image']").on("change",function(e){
        const [file] = e.target.files
        if(file){
            $(".label-image-cover").css("display","none")
            $(".create-show-image-body").css("display","flex")
            $(".create-show-image").attr("src",URL.createObjectURL(file))
        }
    })
    //show list img
    $("input[name='listImage[]").on("change",function(e){
        const [...files] = e.target.files
        const listImg =  files.map(file=>{
            return `
                <div class="product-img">
                    <div class="product-img-wrapper">
                        <img src="${URL.createObjectURL(file)}" />
                        <div class="product-img-delete">
                            <i class="fa-regular fa-trash-can"></i>
                        </div>
                    </div>
                </div>
            `   
        }).join("")
        $(".total-img").text(files.length+"")
        $(".label-list-img").css("display","none")
        $(".list-img-preview").html(listImg)
        //delete img
        $(".product-img-delete").click(function(){
           const parent = $(this).parent().parent()
           if(parent) parent.empty()
        })
    })
    
    // update product
    $("#form-create-product").on("submit",function() {
        $("#description").val($("#editor").html());
      })
   
    

}
// ==============function end===================//

$().ready(function(){
    // -----------home page start----------//
    // show sidebar
    if($(".menumobile")) {
        handleOpenNavMobile()
    }
    // show short collection
    if($(".g-left").length){
        handleShowSortCollection()
    }
    // tree view
    if($(".referral-body")){
        handleTreeView()
        handleReferralTab()
    }
    // -----------home page end----------//

    // -----------shop owner page start---------------------------//
    if($("#form-create-product").length){
        if($("#editor").length){
            var quill = new Quill("#editor", {
               theme: "snow",
            });
        }
        handleCreateProduct()
    }
    if($(".delivery-main").length){
       $(".shop-delivery-top-add").click(function(){
        $(".modal-delivery").css("display","flex")
       }) 
       $(".m-deli-btn-close").click(function(){
        $(".modal-delivery").css("display","none")
       }) 
       $(".modal-delivery").click(function(){
        $(".modal-delivery").css("display","none")
       }) 
       $(".modal-delivery-wrapper").click(function(e){
        e.stopPropagation()
       })
       
    }
    if($(".detail-img-item img").length){
      $(".detail-img-item img").each(function() {
        $(this).mouseover(()=>{
          $(".detail-img-show img").attr("src",$(this).attr("src")) 
        })
      })
    }
    // add to cart
    $(".product-btn").click(function(){
      const id = $(this).attr("idpro")
      const price = $(this).attr("data-price")
      if(id){
        $.ajax({
          url:"?mod=request&act=cart&type=addcart&idpro="+id
        }).done(data=>{
          data =JSON.parse(data)
          toastjs( data.message)
          let newPrice = +price + +$(".view-total-cart").attr("view-total-cart") 
          $(".view-total-cart").text(formartPrice(newPrice))
          $(".view-total-count").text(+$(".view-total-count").attr("view-total-count")+1 +"")
        })

      }
    })


})

const toastEl = document.getElementById("toast")
if(toastEl){
    const mesType = toastEl.getAttribute("mes-type")
    const mesTitle = toastEl.getAttribute("mes-title")
    const mesText = toastEl.getAttribute("mes-text")
    toast({
        title:mesTitle,
        message: mesText,
        type: mesType,
        duration: 4000
    });
   ;
 }
function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toast");
    if (main) {
    const toast = document.createElement("div");

    // Auto remove toast
    const autoRemoveId = setTimeout(function () {
        main.removeChild(toast);
    }, duration + 1000);

    // Remove toast when clicked
    toast.onclick = function (e) {
        if (e.target.closest(".toast__close")) {
        main.removeChild(toast);
        clearTimeout(autoRemoveId);
        }
    };

    const icons = {
        success: "fas fa-check-circle",
        info: "fas fa-info-circle",
        warning: "fas fa-exclamation-circle",
        error: "fas fa-exclamation-circle"
    };
    const icon = icons[type];
    const delay = (duration / 1000).toFixed(2);

    toast.classList.add("toast", `toast--${type}`);
    toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

    toast.innerHTML = `
                    <div class="toast__icon">
                        <i class="${icon}"></i>
                    </div>
                    <div class="toast__body">
                        <h3 class="toast__title">${title}</h3>
                        <p class="toast__msg">${message}</p>
                    </div>
                    <div class="toast__close">
                        <i class="fas fa-times"></i>
                    </div>
                `;
    main.appendChild(toast);
    }
}

function toastjs(text) {
  var x = document.getElementById("snackbar");
  x.className = "show";
  x.textContent=text
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
// ======
