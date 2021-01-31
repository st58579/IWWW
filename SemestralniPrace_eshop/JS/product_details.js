if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    const ProductImg = document.getElementById("product-img");
    const SmallImg = document.getElementsByClassName("small-img");
    SmallImg[0].onclick = function () {
        ProductImg.src = SmallImg[0].src;
    }
    SmallImg[1].onclick = function () {
        ProductImg.src = SmallImg[1].src;
    }
    SmallImg[2].onclick = function () {
        ProductImg.src = SmallImg[2].src;
    }
    SmallImg[3].onclick = function () {
        ProductImg.src = SmallImg[3].src;
    }
    const ReviewStars = document.getElementsByClassName("fa fa-star-o");
    for (let i = 0; i < 5; i++) {
        ReviewStars[i].addEventListener("mouseenter", function (event) {
            // highlight the mouseenter target
            event.target.style.color = "gold";

            // reset the color after a short delay
            setTimeout(function () {
                event.target.style.color = "";
            }, 500);
        }, false);
        ReviewStars[i].addEventListener("mouseover", function (event) {
            // highlight the mouseover target
            event.target.style.color = "orange";

            // reset the color after a short delay
            setTimeout(function () {
                event.target.style.color = "";
            }, 500);
        }, false);
        ReviewStars[i].addEventListener("click", function (event) {
            let hidden = document.getElementById("hidden-review-rating");
            hidden.value = i+1;
        }, false);
    }
}
