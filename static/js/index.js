//统一的js页面逻辑封装，方便后期维护管理
// Unified js page logic encapsulation for a better maintainance and management
const Index = {
    // Objects for storing data 存储数据用的对象
    data: {
        htmlCard: ""
    },
    //Object for storing function 存储函数的对象
    func: {
        init: function () {
            Index.func.getBanner();
            Index.func.getRecommendation();
        },
        searchItem: function () {
            var item = document.getElementById("search").value;
            if (item == null || item.trim() == "") {
                return;
            }
            document.getElementById("searchForm").submit();
        },
        LoginPopUp: function () {
            document.querySelector('.mask').classList.add('active');
            document.querySelector('.login-box').classList.add('active');
        },
        CloseLogin: function () {
            document.querySelector('.mask').classList.remove('active');
            document.querySelector('.login-box').classList.remove('active');
        },
        RegisterPopUp: function () {
            document.querySelector('.login-box').classList.remove('active');
            document.querySelector('.register-box').classList.add('active');
        },
        CloseRegister: function () {
            document.querySelector('.mask').classList.remove('active');
            document.querySelector('.register-box').classList.remove('active');
        },
        getRecommendation: function () {
            fetch("../controller/getData.php", {
                method: "POST",
                mode: "cors",
                credentials: "include"
            }).then(Response => {
                return Response.json()
            }).then(data => {
                data.forEach(recommendation => {
                    Index.data.htmlCard +=
                        `<a href="./view.php?id=${recommendation.id}">
                        <img src="${recommendation.image}">
                        <p>${recommendation.title}</p>
                    </a>`
                });
                const recommend = document.querySelector("#recomend");
                recommend.innerHTML = Index.data.htmlCard;
            });
        },
        getBanner: function () {
            fetch("../controller/getBanner.php", {
                method: "POST",
                mode: "cors",
                credentials: "include"
            }).then(Response => {
                return Response.json()
            }).then(data => {
                data.forEach(banner => {
                    Index.data.htmlCard +=
                        `<a href="./view.php?id=${banner.id}">
                            <img src="${banner.image}">
                        </a>`
                });
                const banner = document.querySelector("#banner");
                banner.innerHTML = Index.data.htmlCard;
            });
        },
    }
}

//go back to page
function goBack() {
    history.back();
}
//BUY 
function buy(postid, userid) {
    location = "../controller/buy.php?postid=" + postid + "&userid=" + userid;
}
//buy item
function goBuy(id) {
    location = "./Buy.php?id=" + id;
}

//collect post
function collect(postId) {
    location = "../controller/collect.php?id=" + postId;
}

// banner
var index = 0;

function refresh() {
    if (index < 0) {
        index = 4;
    } else if (index > 4) {
        index = 0
    }
    var box = document.querySelector('.banner');

    let width = getComputedStyle(box).width;
    width = Number(width.slice(0, -2));

    box.querySelector(".image").style.left =
        index * width * -1 + "px";
}

function leftShift() {
    index--;
    refresh();
}

function rightShift() {
    index++;
    refresh();
}

function ShiftByNum(int) {
    index = int;
    refresh();
}

refresh();