//comfirm order
function comfirm(orderid, status) {
    if (status == 0) {
        location = "../controller/comfirm.php?orderid=" + orderid;
    } else {
        alert("Your order has been completed");
    }
}

//cancel collection
function cancel(postId) {
    location = "../controller/cancel.php?id=" + postId;
}


// delete post
function Delete(id) {
    if (confirm("Are you sure to delete this post?")) {
        location = '../controller/delete.php?id=' + id;
    }
}

//Edit post
function Edit(id) {
    location = '../controller/edit.php?id=' + id;
}

// publish form
function validate() {
    var title = document.getElementById("title").value;
    if (title == null || title.trim() == "") {
        alert("You must write something in the title");
        return false;
    }
    return true;
}


// navigation
let list = document.querySelectorAll("#nav");
for (let i = 0; i < list.length; i++) {
    list[i].onclick = function () {
        for (let i = 0; i < list.length; i++) {
            list[i].classList.remove("active");
            document.querySelectorAll(".info")[i].classList.remove("show");
        }
        list[i].classList.add("active");
        document.querySelectorAll(".info")[i].classList.add("show");
    }
}